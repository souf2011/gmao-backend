<?php

namespace App\Http\Controllers;

use App\Models\Aprovisionement;
use Illuminate\Http\Request;

class AprovisionementController extends Controller
{
    public function index()
    {
        $approvisionnements = Aprovisionement::with('user')->get();
        return response()->json($approvisionnements, 200);
    }

    // Ajouter un nouvel enregistrement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'qte' => 'required|integer',
            'unite' => 'required|string|max:50',
            'intervenant_id' => 'required|integer|exists:users,user_id',
            'reference' => 'required|string|max:100',
            'designation' => 'required|string|max:255',
            'numeroDA' => 'required|string|max:100',
            'statut' => 'required|string|max:50',
            'bc' => 'required|string|max:100',
        ]);

        $aprovisionement = Aprovisionement::create($validated);

        return response()->json($aprovisionement, 201);
    }

    // Afficher un seul enregistrement
    public function show($id)
    {
        $aprovisionement = Aprovisionement::findOrFail($id);
        return response()->json($aprovisionement, 200);
    }

    // Mettre à jour un enregistrement
    public function update(Request $request, $id)
    {
        $aprovisionement = Aprovisionement::findOrFail($id);

        $validated = $request->validate([
            'qte' => 'sometimes|integer',
            'unite' => 'sometimes|string|max:50',
            'reference' => 'sometimes|string|max:100',
            'designation' => 'sometimes|string|max:255',
            'numeroDA' => 'sometimes|string|max:100',
            'statut' => 'sometimes|string|max:50',
            'bc' => 'sometimes|string|max:100',
        ]);

        $aprovisionement->update($validated);

        return response()->json($aprovisionement, 200);
    }

    // Supprimer un enregistrement
    public function destroy($id)
    {
        $aprovisionement = Aprovisionement::findOrFail($id);
        $aprovisionement->delete();

        return response()->json(['message' => 'Aprovisionement deleted successfully'], 200);
    }
}
