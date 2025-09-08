<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // liste des produits et leur categorie
    public function index() {
        $products = Product::with('category')->get();
        return view('Products.list', compact('products'));
    }

    // creation du produit
    public function create() {
        $categories = Category::all();
        return view('Products.create', compact('categories')); 
    }

    // enregistrement du produit
    public function store(Request $request) {
        try {
            // validation des champs
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
            ]);
            // generation du code et du slug
            $slug = Str::random(6);

            $code = 'PRO-' . strtoupper(Str::random(5));

            // enregistrement du produit
            $product = new Product();
            $product->code = $code;
            $product->slug = $slug;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->save();
            return redirect()->route('products.liste')->with('success', 'Produit enregistré avec succès.');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement du produit.'. $e->getMessage());
        }
    } 
}
