<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::all()->map(function ($cat) {
            return [
                'id' => $cat->id,
                'nom' => $cat->nom,
                'description' => $cat->description,
                'image' => $cat->image ? asset('storage/Categorie/' . $cat->image) : null,
            ];
        });

        return response()->json($categories);
    }



    public function create()
    {
        // This method can remain empty if you don't have a specific form for this.
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Store inside storage/app/public/Categorie
            $path = $request->file('image')->store('Categorie', 'public');

            // Save only the file name (ex: mecanique.jpg)
            $data['image'] = basename($path);
        }

        $category = Categories::create($data);

        return response()->json([
            'message' => 'Catégorie créée avec succès',
            'data' => $category
        ], 201);
    }






    public function show($id)
    {
        $category = Categories::findOrFail($id);
        return response()->json($category);
    }



    public function edit(Categories $categories)
    {
        // You can add logic here for editing if required.
    }


    public function update(Request $request, Categories $category)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // If user uploads a new image
        if ($request->hasFile('image')) {
            // delete old image if it exists
            if ($category->image && \Storage::disk('public')->exists('Categorie/' . $category->image)) {
                \Storage::disk('public')->delete('Categorie/' . $category->image);
            }

            // store new image
            $imagePath = $request->file('image')->store('Categorie', 'public');
            $data['image'] = basename($imagePath);
        }

        $category->update($data);

        return response()->json([
            'message' => 'Catégorie mise à jour avec succès',
            'data' => $category
        ]);
    }



    public function destroy(Categories $category)
    {
        if ($category->categorie_image) {
            Storage::delete('public/images/' . $category->categorie_image);
        }

        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
