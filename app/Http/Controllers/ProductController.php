<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();


    if ($request->hasFile('images')) {
        $imageName = $request->file('images')->getClientOriginalName();
        $request->file('images')->move(public_path('assets'), $imageName);
        $input['images'] =  $imageName;
    }

        Product::create($input);

        return redirect('products')->with('flash_message', 'Product added!');
    }


public function index()
{
    $products = Product::with('category')->get();
    return view('products.index', compact('products'));
}


public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $input = $request->all();

        
        if ($request->hasFile('images')) {
            $imageName = $request->file('images')->getClientOriginalName();
            $request->file('images')->move(public_path('assets'), $imageName);
            $input['images'] = $imageName;
        }

        $product->update($input);

        return redirect('products')->with('flash_message', 'Product updated successfully!');
    }

    public function edite(Product $product)
    {
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
    }
    
    public function destroy(Product $product)
    {
    $product->delete();

    return redirect('products')->with('flash_message', 'Product deleted!');
}
    
}