<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Http\View;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug = null)
    {
        $product = Product::all();
        $categories = categories::all();
        return view('product.index', compact('product', 'categories'));
    }

    public function category($slug)
    {
        // Récupérez la catégorie en fonction du slug
        $category = categories::where('slug', $slug)->firstOrFail();
        // Récupérez les produits associés à cette catégorie
        $product = $category->product;
        $categories = categories::all();
        return view('category.index', compact('product','categories'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);
        $product = new Product();
        $product->categories_id = $request->categories_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return back()->with('message', "Le produit a bien été créée !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = $product->categories->name;
        return view('product.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:products,name,'. $product->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);
        $product->categories_id = $request->categories_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return back()->with('message', "La sneakers a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
