<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }


    public function create()
    {
        // This method can remain empty if you don't have a specific form for this.
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'categorie_name' => 'required|string|max:255',
            'categorie_description' => 'required|string|max:255',
            'categorie_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('categorie_image')) {
            $imagePath = $request->file('categorie_image')->store('categories', 'public');
            $data['categorie_image'] = basename($imagePath);
        }
        $category = Categories::create($data);
        return response()->json([
            'message' => 'Category created successfully',
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
            'categorie_name' => 'required|string|max:255',
            'categorie_description' => 'required|string|max:255',
            'categorie_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('categorie_image')) {
            $imagePath = $request->file('categorie_image')->store('categories', 'public');
            $data['categorie_image'] = basename($imagePath);
        }

        $category->update($data);

        return response()->json([
            'message' => 'Category updated successfully',
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
