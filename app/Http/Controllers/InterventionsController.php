<?php

namespace App\Http\Controllers;

use App\Models\Intervention;

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

        if ($user->role === 'intervenant') {
            // Intervenant : ne voit que ses interventions assignées
            $interventions = Intervention::where('intervenant_id', $user->id)->get();
        } else {
            // Admin ou autres : voit toutes les interventions
            $interventions = Intervention::all();
        }

        return response()->json($interventions);
    }




    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'equipement'   => 'required|string|max:255',
            'intervenant_id'  => 'required|string|max:255',
            'description'  => 'nullable|string',
            'date'         => 'nullable|date',
            'emplacement'  => 'nullable|string|max:255',
            'demandeur'    => 'nullable|string|max:255',
            'statut'       => 'nullable|string|max:50',
            'priorite'     => 'nullable|string|max:50',
            'type'         => 'nullable|string|max:50'
        ]);
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('intervenants', 'public');
            $validation['Image'] = $imagePath;
        }
        if ($request->hasFile('Fichier')) {
            $filePath = $request->file('Fichier')->store('files', 'public');
            $validation['Fichier'] = $filePath;
        }
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié'], 401);
        }

        // Ajoute l'ID de l'utilisateur connecté comme intervenant
        $validation['intervenant_id'] = $user->id;


        $intervention = Intervention::create($validation);

        return response()->json([
            'message' => 'Intervenant created successfully',
            'intervention' => $intervention
        ], 201);



    }


    public function show($id)
    {
        $intervention = Intervention::find($id);
        if (!$intervention) {
            return response()->json(['message' => 'Intervenant not found'], 404);
        }
        return response()->json($intervention);
    }



    public function edit(Intervention $intervention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervention $intervention)
    {
        //
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
