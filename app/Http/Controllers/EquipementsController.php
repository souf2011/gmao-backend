<?php

namespace App\Http\Controllers;

use App\Models\Equipements;
use Illuminate\Http\Request;

class EquipementsController extends Controller
{
    public function index()
    {
        $equipements = Equipements::all();
        return response()->json($equipements);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validateData = [
            'Code_Equipement' => 'required|string|max:255|unique:equipements,Code_Equipement',
            'N_Serie' => 'required|string|max:255',
            'Fin_Garantie' => 'required|date',
            'Compteur' => 'required|integer',
            'Operateur' => 'required|string|max:255',
            'Categorie_id' => 'required|integer|exists:categories,id',
            'Emplacement_id' => 'required|integer|exists:emplacements,id',
            'image_Equipement' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Marque' => 'required|string|max:255',
            'Modele_Equipement' => 'required|string|max:255',
        ];

        $data = $request->validate($validateData);
        $data['Nom_Equipement'] = $request->input('Code_Equipement') . ' ' . $request->input('Marque') . ' ' . $request->input('Modele_Equipement');

        if ($request->hasFile('image_Equipement')) {
            $imagePath = $request->file('image_Equipement')->store('public/images');
            $data['image_Equipement'] = basename($imagePath);
        }

        $equipement = Equipements::create($data);

        return response()->json([
            'message' => 'Equipement created successfully',
            'data' => $equipement
        ], 201);
    }

    public function show($id)
    {
        $equipements = Equipements::find($id);
        if (!$equipements) {
            return response()->json(['message' => 'Equipement not found'], 404);
        }

        return response()->json($equipements);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipements $equipements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipements $equipements) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $equipement = Equipements::findOrFail($id);
            if (!$equipement) {
                return response()->json(['message' => 'Equipement not found'], 404);
            }
            $equipement->delete();
            return response()->json(['message' => 'Equipement deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete equipement',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
