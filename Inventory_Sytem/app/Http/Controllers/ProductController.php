<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'selling_price' => 'nullable|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function showSingleProduct($product_id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($product_id);
    
        return view('products.single', compact('product'));
    }
    
    
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'selling_price' => 'nullable|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            // Delete the related sales records
            $product->sales()->delete();

            // Delete the related purchases records
            $product->purchases()->delete();

            // Delete the related restocks records
            $product->restocks()->delete();

            // Delete the product itself
            $product->delete();
        });

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
            ->limit(10) // Limit the number of results to 10 for performance
            ->get(['name']);

        return response()->json($products);
    }
}
