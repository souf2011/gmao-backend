<?php

namespace App\Http\Controllers;

use App\Models\Suivi;
use Illuminate\Http\Request;

class SuiviController extends Controller
{
    /**
     * Afficher la liste des suivis
     */
    public function index()
    {
        $suivis = Suivi::with('intervention')->get();
        return response()->json($suivis);
    }

    /**
     * Créer un nouveau suivi
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'intervention_id' => 'required|exists:interventions,id',
            'dateSuivi'       => 'required|date',
            'intervenant'     => 'required|string|max:255',
            'tache'           => 'required|string',
            'nbHeures'        => 'required|numeric|min:0',
            'pourcentage'     => 'required|numeric|min:0|max:100',
        ]);

        $suivi = Suivi::create($validated);

        return response()->json($suivi, 201);
    }

    /**
     * Afficher un suivi par ID
     */
    public function show($id)
    {
        $suivi = Suivi::with('intervention')->findOrFail($id);
        return response()->json($suivi);
    }

    /**
     * Mettre à jour un suivi
     */
    public function update(Request $request, $id)
    {
        $suivi = Suivi::findOrFail($id);

        $validated = $request->validate([
            'dateSuivi'   => 'sometimes|date',
            'intervenant' => 'sometimes|string|max:255',
            'tache'       => 'sometimes|string',
            'nbHeures'    => 'sometimes|numeric|min:0',
            'pourcentage' => 'sometimes|numeric|min:0|max:100',
        ]);

        $suivi->update($validated);

        return response()->json($suivi);
    }

    /**
     * Supprimer un suivi
     */
    public function destroy($id)
    {
        $suivi = Suivi::findOrFail($id);
        $suivi->delete();

        return response()->json(['message' => 'Suivi supprimé avec succès']);
    }
}
