<?php

namespace App\Http\Controllers;

use App\Models\Interventions;
use Illuminate\Http\Request;

class InterventionsController extends Controller
{
    // Get all interventions
    public function index()
    {
        $interventions = Interventions::all();
        return response()->json($interventions);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'equipement' => 'required|string|max:255',
            'responsable' => 'required|string|email|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'emplacement' => 'nullable|string|max:255',
            'demandeur' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:100',
            'priorite' => 'nullable|string|max:50',
            'etat' => 'nullable|string|max:50',
            'type' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('intervention', 'public');
            $validation['Image'] = $imagePath;
        }

        if ($request->hasFile('Fichier')) {
            $filePath = $request->file('Fichier')->store('files', 'public');
            $validation['Fichier'] = $filePath;
        }

        $intervention = Interventions::create($validation);

        return response()->json([
            'message' => 'Intervention created successfully',
            'intervention' => $intervention
        ], 201);
    }

    public function show($id)
    {
        $intervention = Interventions::find($id);
        if (!$intervention) {
            return response()->json(['message' => 'Intervention not found'], 404);
        }
        return response()->json($intervention);
    }

    // Update intervention by id
    public function update(Request $request, $id)
    {
        $intervention = Interventions::find($id);
        if (!$intervention) {
            return response()->json(['message' => 'Intervention not found'], 404);
        }

        $validation = $request->validate([
            'equipement' => 'sometimes|required|string|max:255',
            'responsable' => 'sometimes|required|string|email|max:255',
            'description' => 'nullable|string',
            'date' => 'sometimes|required|date',
            'emplacement' => 'nullable|string|max:255',
            'demandeur' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:100',
            'priorite' => 'nullable|string|max:50',
            'etat' => 'nullable|string|max:50',
            'type' => 'nullable|string|max:50',
        ]);

        $intervention->update($validation);

        return response()->json([
            'message' => 'Intervention updated successfully',
            'intervention' => $intervention
        ]);
    }

    public function destroy($id)
    {
        $intervention = Interventions::find($id);
        if (!$intervention) {
            return response()->json(['message' => 'Intervention not found'], 404);
        }
        $intervention->delete();
        return response()->json(['message' => 'Intervention deleted successfully']);
    }
}

