<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Afficher tous les services
    public function index()
    {
        $services = Service::all();  // Récupérer tous les services
        return response()->json($services);  // Retourner les services en format JSON
    }

    // Afficher un service spécifique
    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service non trouvé'], 404);
        }

        return response()->json($service);  // Retourner un service spécifique
    }

    // Créer un nouveau service
    public function store(Request $request)
    {
        $request->validate([
            'nom_service' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service = Service::create([
            'nom_service' => $request->nom_service,
            'description' => $request->description,
        ]);

        return response()->json($service, 201);  // Retourner le service créé
    }

    // Mettre à jour un service existant
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service non trouvé'], 404);
        }

        $request->validate([
            'nom_service' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service->update([
            'nom_service' => $request->nom_service,
            'description' => $request->description,
        ]);

        return response()->json($service);  // Retourner le service mis à jour
    }

    // Supprimer un service
    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service non trouvé'], 404);
        }

        $service->delete();  // Supprimer le service

        return response()->json(['message' => 'Service supprimé avec succès']);  // Retourner un message de succès
    }
}
