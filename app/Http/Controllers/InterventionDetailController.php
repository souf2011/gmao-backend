<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\InterventionDetail;
use Illuminate\Http\Request;

class InterventionDetailController extends Controller
{
    public function show($id)
    {
        // Load the intervention with relationships (if needed)
        $intervention = Intervention::with(['equipement', 'emplacement', 'intervenant'])
            ->find($id);

        if (!$intervention) {
            return response()->json(['message' => 'Intervention not found'], 404);
        }

        return response()->json($intervention, 200);
    }// Store details when intervention is finished
    public function store(Request $request, $interventionId)
    {
        $request->validate([
            'heures' => 'required|integer|min:0',
            'materiel_utilise' => 'nullable|string',
            'remarques' => 'nullable|string',
        ]);

        $intervention = Intervention::findOrFail($interventionId);

        // update intervention status
        $intervention->etat = 'terminé';
        $intervention->save();

        // create detail
        $detail = InterventionDetail::create([
            'intervention_id' => $intervention->id,
            'heures' => $request->heures,
            'materiel_utilise' => $request->materiel_utilise,
            'remarques' => $request->remarques,
        ]);

        return response()->json([
            'message' => 'Intervention terminée avec succès',
            'intervention' => $intervention,
            'details' => $detail
        ]);
    }
}

