<?php

namespace App\Http\Controllers;

use App\Models\Equipements;
use App\Models\Intervention;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterventionsController
{


    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié'], 401);
        }

        if ($user->role->role_label === 'Intervenant') {
            $interventions = Intervention::with(['intervenant', 'emplacement', 'equipement'])
                ->where('intervenant_id', $user->user_id)
                ->latest() // equivalent to orderBy('created_at', 'desc')
                ->get();
        } else {
            $interventions = Intervention::with(['intervenant', 'emplacement', 'equipement'])
                ->latest()
                ->get();
        }

        return response()->json($interventions);
    }






    public function create()
    {
        //
    }
    public function store(Request $request)
    {


        $request->merge([
            'equipement_id' => (int) $request->equipement_id,
            'emplacement_id' => (int) $request->emplacement_id,
        ]);
        // Validate incoming request
        $validation = $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'emplacement_id' => 'required|exists:emplacements,id',
            'description'    => 'required|string',
            'demandeur'      => 'required|string|max:255',
            'priorite'       => 'required|string|max:50',
            'type'           => 'required|string|max:50',
            'intervenant_id' => 'required|exists:users,user_id',
            'etat'           => 'required|string|max:50',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié'], 401);
        }


        $intervention = Intervention::create($validation);

        \Log::info('Incoming request data:', $request->all());


        return response()->json($intervention, 201);
    }
    public function dashboardStats()
    {
        // Average resolution time (in hours, for example)
        $averageResolution = Intervention::where('etat', 'terminé')
            ->whereNotNull('updated_at') // or completed_at if you have that column
            ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, created_at, updated_at)) as avg_time')
            ->value('avg_time');

        return response()->json([
            'interventions_total' => Intervention::count(),
            'interventions_en_cours' => Intervention::where('etat', 'en cours')->count(),
            'urgent_interventions' => Intervention::where('priorite', 'haute')->count(),
            'interventions_termine' => Intervention::where('etat', 'terminé')->count(),
            'last_interventions' => Intervention::with('intervenant')
                ->latest()
                ->take(5)
                ->get()
                ->map(function ($intervention) {
                    return [
                        'id' => $intervention->id,
                        'date' => $intervention->created_at,
                        'technicien' => $intervention->intervenant
                            ? $intervention->intervenant->first_name . ' ' . $intervention->intervenant->last_name
                            : 'N/A',
                        'etat' => $intervention->etat,
                         'priorite' => $intervention->priorite,
                        ];
                }),
            'average_resolution_time' => round($averageResolution, 2), // e.g. 5.23 hours
        ]);
    }
    public function equipementStats()
    {
        $equipementStats = Equipements::selectRaw("
        SUM(CASE WHEN status = 'Besoin de maintenance' THEN 1 ELSE 0 END) as besoinMaintenance,
        SUM(CASE WHEN status = 'Disponible' THEN 1 ELSE 0 END) as disponible,
        SUM(CASE WHEN status = 'En service' THEN 1 ELSE 0 END) as enService,
        SUM(CASE WHEN status = 'En stock' THEN 1 ELSE 0 END) as enStock,
        SUM(CASE WHEN status = 'En attente' THEN 1 ELSE 0 END) as enAttente
    ")->first();

        return response()->json([
            'equipementStats' => $equipementStats
        ]);
    }



    public function history($equipementId)
    {
        $interventions = Intervention::where('equipement_id', $equipementId)
            ->with(['equipement','intervenant','emplacement']) // if you want equipment details
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($interventions);
    }




    public function show($id)
    {
        $intervention = Intervention::with(['emplacement', 'equipement', 'intervenant','suivis'])
            ->find($id);

        if (!$intervention) {
            return response()->json(['message' => 'Intervention not found'], 404);
        }

        return response()->json($intervention);
    }




    public function edit(Intervention $intervention)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $intervention = Intervention::findOrFail($id);

        $oldEtat = $intervention->etat;

        // Update intervention with new request data
        $intervention->update($request->all());

        // Check if etat changed to 'terminé'
        if ($oldEtat !== 'terminé' && $intervention->etat === 'terminé') {

            // 1️⃣ Notify the demandeur if user_id exists
            $demandeurUser = User::whereRaw("CONCAT(first_name, ' ', last_name) = ?", [$intervention->demandeur])->first();
            $intervenantUser = User::find($intervention->intervenant_id);
            if ($demandeurUser) {
                Notification::create([
                    'user_id' => $demandeurUser->user_id,
                    'intervention_id' => $intervention->id,
                    'message' => "L'intervention de {$intervenantUser->first_name} {$intervenantUser->last_name} est terminée.",
                    'type' => 'finished-intervention',
                ]);
            }

            // 2️⃣ Optional: Notify all admins
            $admins = User::where('role_id', 1)->get();
            foreach ($admins as $admin) {
                Notification::create([
                    'user_id' => $admin->user_id,
                    'intervention_id' => $intervention->id,
                    'message' => "L'intervention de {$intervenantUser->first_name} {$intervenantUser->last_name} est terminée.  ",
                    'type' => 'finished-intervention',
                ]);
            }
        }
    }



    public function equipement()
    {
        return $this->belongsTo(Equipement::class, 'equipement_id');
    }

    // Optional: if you have emplacement relationship
    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class, 'emplacement_id');
    }

    public function destroy($id)
    {
        $intervention = Intervention::find($id);
        if (!$intervention) {
            return response()->json(['message' => 'Intervenant not found'], 404);
        }
        $intervention->delete();
        return response()->json(['message' => 'Intervenant deleted successfully']);
    }
}
