<?php

namespace App\Http\Controllers;

use App\Models\Intervenants;
use Illuminate\Http\Request;

class IntervenantsController extends Controller
{

    public function index()
    {
        $Intervanants = Intervenants::all();
        return response()->json($Intervanants);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nom_intervenant' => 'required|string|max:255',
            'Date_Naissance' => 'nullable|date',
            'Telephone' => 'required|string|max:15',
            'Email' => 'nullable|email|max:255',
            'Genre' => 'nullable|in:Homme,Femme',
            'Poste' => 'required|string|max:255',
            'CIN' => 'nullable|string|max:20',
            'DateEmbauche' => 'nullable|date',
            'Service' => 'required|string|max:255',
            'TypeFichier' => 'nullable|string|max:50',
            'Image' => 'nullable|image|max:2048',
            'Fichier' => 'nullable|file|max:2048',
        ]);
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('intervenants', 'public');
            $validation['Image'] = $imagePath;
        }
        if ($request->hasFile('Fichier')) {
            $filePath = $request->file('Fichier')->store('files', 'public');
            $validation['Fichier'] = $filePath;
        }
        $intervenant = Intervenants::create($validation);
        return response()->json([
            'message' => 'Intervenant created successfully',
            'intervenant' => $intervenant
        ], 201);
    }

    
    public function show($id)
    {
        $intervenant = Intervenants::find($id);
        if (!$intervenant) {
            return response()->json(['message' => 'Intervenant not found'], 404);
        }
        return response()->json($intervenant);
    }


   
    public function edit(Intervenants $intervenants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervenants $intervenants)
    {
        //
    }

 
    public function destroy($id)
    {
        $intervenant = Intervenants::find($id);
        if (!$intervenant) {
            return response()->json(['message' => 'Intervenant not found'], 404);
        }
        $intervenant->delete();
        return response()->json(['message' => 'Intervenant deleted successfully']);
    }
}
