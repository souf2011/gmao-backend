<?php

namespace App\Http\Controllers;

use App\Models\Emplacements;
use Illuminate\Http\Request;

class EmplacementsController extends Controller
{

    public function index()
    {
        $emplacements = Emplacements::all();
        return response()->json($emplacements);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $validateData = [
            'nom_emplacement' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
        $data = $request->validate($validateData);
        $emplacement = Emplacements::create($data);
        return response()->json([
            'message' => 'Emplacement created successfully',
            'data' => $emplacement
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $emplacement = Emplacements::findOrFail($id);
        return response()->json($emplacement);
    }


    public function edit(Emplacements $emplacements)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $emplacement = Emplacements::findOrFail($id);
        $validateData = [
            'nom_emplacement' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
        $data = $request->validate($validateData);
        $emplacement->update($data);
        return response()->json([
            'message' => 'Emplacement updated successfully',
            'data' => $emplacement
        ], 200);
    }



    public function destroy($id)
    {
        $emplacement = Emplacements::find($id);
    
        if (!$emplacement) {
            return response()->json([
                'message' => 'Emplacement non trouvé',
            ], 404);
        }
    
        $emplacement->delete();
    
        return response()->json([
            'message' => 'Emplacement supprimé avec succès',
        ], 200);
    }
    
}
