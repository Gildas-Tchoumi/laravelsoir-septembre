<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CategoryController extends Controller
{
    //liste des categories
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('Categories.liste',compact('categories'));
    }

    //creation de la categorie
    public function create()
    {
        return view('Categories.create');
    }

    //enregistrement de la categorie
    public function store(Request $request) {
        // dd($request->all());
        try {
            //validation des champs
            $request->validate([
                'name' => 'required|string|max:255',
                'abbreviation' => 'required|string|max:10',
                'description' => 'nullable|string',
            ]);
            // dd($request->all());
            // $category = new Category();
            // $category->name = $request->name;
            // $category->abbreviation = $request->abbreviation;
            // $category->description = $request->description;
            // $category->save();

            $cat = Category::create([
                'name' => $request->name,
                'abbreviation' => $request->abbreviation,
                'description' => $request->description,
            ]);

           return redirect()->route('categories.liste')->with('success', 'Catégorie enregistrée avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de la catégorie.'. $e->getMessage());
        }
    }

    // delete a category
    public function destroy($id) {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Catégorie non trouvée.');
        }
        // dd($category);
        $category->delete();
        return redirect()->route('categories.liste')->with('success', 'Catégorie supprimée avec succès.');
    }
}
