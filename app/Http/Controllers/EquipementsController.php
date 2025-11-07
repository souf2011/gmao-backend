<?php

namespace App\Http\Controllers;

use App\Models\Equipements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipementsController extends Controller
{

    public function index()
{
    $user = Auth::user();

    $equipements = Equipements::all(); // returns all rows + all columns
    return response()->json($equipements);
}
    public function indexmaintenance()
    {
        $equipements = Equipements::with('maintenance')->get();
        return response()->json($equipements);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Code_Equipement'       => 'required|string|max:255|unique:equipements,Code_Equipement',
            'N_Serie'               => 'required|string|max:50',
            'Categorie'             => 'required|string|max:255',
            'Emplacement'           => 'required|string|max:255',
            'Equipement'             => 'required|string|max:255',
            'Compteur'              => 'required|integer',
            'status'                => 'nullable|string|max:50',
            'Categorie_Equipement'  => 'required|string|max:255',
            'Type_Moteur'           => 'nullable|string|max:100',
            'matricule'             => 'nullable|string|max:100',
            'Modele_Equipement'     => 'nullable|string|max:255',
            'Operateur'             => 'nullable|string|max:255',
            'Fin_Garantie'          => 'nullable|date',
            'Prix_Acquisition'      => 'nullable|numeric',
            'Date_Acquisition'      => 'nullable|date',
            'Prix_Location'         => 'nullable|numeric',
            'Prochaine_Vidange'     => 'nullable|date',
            'Nom_Fichier'           => 'nullable|string|max:255',
            'Commentaire'           => 'nullable|string',
            'image_Equipement'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Marque'                => 'nullable|string|max:255',
        ]);

        // Combine Code, Marque, Modele into Nom_Equipement
        $validatedData['Nom_Equipement'] = $request->input('Code_Equipement')
            . ' ' . $request->input('Marque', '')
            . ' ' . $request->input('Modele_Equipement', '');

        // Handle image upload
        if ($request->hasFile('image_Equipement')) {
            $imagePath = $request->file('image_Equipement')->store('public/images');
            $validatedData['image_Equipement'] = basename($imagePath);
        }

        $equipement = Equipements::create($validatedData);

        return response()->json([
            'message' => 'Équipement créé avec succès',
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
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'equipement_id');
    }
    public function edit(Equipements $equipements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $equipement = Equipements::findOrFail($id);

            $validated = $request->validate([
                'Emplacement' => 'sometimes|string|max:100',
                'Code_Equipement' => 'sometimes|string|max:100',
                'Categorie_Equipement' => 'sometimes|string|max:100',
                'N_Serie' => 'sometimes|string|max:100',
                'Compteur' => 'sometimes|integer',
                'Type_Moteur' => 'sometimes|string|max:100',
                'matricule' => 'sometimes|string|max:100',
                'Modele_Equipement' => 'sometimes|string|max:255',
                'Operateur' => 'sometimes|string|max:255',
                'Fin_Garantie' => 'sometimes|date',
                'Prix_Acquisition' => 'sometimes|numeric',
                'Date_Acquisition' => 'sometimes|date',
                'status'    => 'sometimes|string|max:50',
                'Prix_Location' => 'sometimes|numeric',
                'Prochaine_Vidange' => 'sometimes|date',
                'Nom_Fichier' => 'sometimes|string|max:255',
                'Commentaire' => 'sometimes|string',
            ]);

            $equipement->update($validated);

            return response()->json([
                'message' => 'Équipement mis à jour avec succès',
                'data' => $equipement
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Équipement non trouvé'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de la mise à jour',
                'error' => $e->getMessage()
            ], 500);
        }
    }


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
