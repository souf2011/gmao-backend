<?php

namespace App\Http\Controllers;

use App\Models\Equipements;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    // Update equipment status based on remaining lifespan
    private function updateEquipmentStatus($equipement)
    {
        // Make sure we have fresh maintenance records
        $equipement->load('maintenance');

        $needsMaintenance = false;

        foreach ($equipement->maintenance as $m) {
            $lifespan = (int) $m->lifespan;
            $lastValue = isset($m->last_values) ? (int) $m->last_values : 0;
            $current = (int) $equipement->Compteur;

            $remaining = $lifespan - ($current - $lastValue);

            if ($remaining <= 200) {
                $needsMaintenance = true;
                break;
            }
        }

        $equipement->status = $needsMaintenance ? "Besoin de maintenance" : "Disponible";
        $equipement->save();
    }



    // Get all equipments with maintenance
    public function indexAllMaintenance()
    {
        $equipements = Equipements::with('maintenance')->get();

        foreach ($equipements as $equipement) {
            $this->updateEquipmentStatus($equipement);
        }

        return response()->json($equipements);
    }

    // Get maintenance for a specific equipment
    public function getByEquipment($id)
    {
        $maintenance = Maintenance::with('equipment')
            ->where('equipement_id', $id)
            ->get();

        if ($maintenance->isEmpty()) {
            return response()->json(['message' => 'Aucune maintenance trouvée'], 404);
        }

        return response()->json($maintenance);
    }

    // Add a new maintenance record
    public function store(Request $request)
    {
        $request->validate([
            'equipement_id' => 'required|integer|exists:equipements,id',
            'type' => 'required|in:pneus,vidange,batterie,filtre',
            'last_values' => 'required|integer',
            'lifespan' => 'required|integer'
        ]);

        $record = Maintenance::create($request->all());

        return response()->json($record, 201);
    }

    // Update a maintenance record
    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::findOrFail($id);

        // Update last_values if provided
        if ($request->has('last_values')) {
            $maintenance->last_values = (int) $request->input('last_values');
        }

        // Update lifespan if provided
        if ($request->has('lifespan')) {
            $maintenance->lifespan = (int) $request->input('lifespan');
        }

        $maintenance->save();

        // Reload equipment and its maintenance to update status correctly
        $this->updateEquipmentStatus($maintenance->equipment->fresh());

        return response()->json([
            'message' => 'Opération mise à jour avec succès.',
            'maintenance' => $maintenance,
            'status' => $maintenance->equipment->status
        ]);
    }


    // Update equipment compteur
    public function updateCompteur(Request $request, $id)
    {
        $equipement = Equipements::with('maintenance')->findOrFail($id);

        $equipement->Compteur = $request->input('Compteur');
        $equipement->save();

        $this->updateEquipmentStatus($equipement);

        return response()->json([
            'message' => 'Compteur mis à jour !',
            'Compteur' => $equipement->Compteur,
            'status' => $equipement->status
        ]);
    }

    // Delete a maintenance record
    public function destroy($id)
    {
        $record = Maintenance::findOrFail($id);
        $record->delete();

        return response()->json(['message' => 'Maintenance deleted successfully']);
    }
}
