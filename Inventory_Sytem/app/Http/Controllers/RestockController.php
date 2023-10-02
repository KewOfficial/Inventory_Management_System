<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restock; // Corrected model name
use Illuminate\Support\Facades\Log;

class RestockController extends Controller
{
    public function index()
    {
        $restocks = Restock::all();

        return view('restocks.index', compact('restocks'));
    }

    public function create()
    {
        $products = Product::all();

        return view('restocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'name' => 'required', // Add name validation
        ]);
    
        // Find the product
        $product = Product::findOrFail($request->input('product_id'));
    
        // Create a new restock record
        $restock = Restock::create([
            'product_id' => $product->id,
            'submitted_quantity' => $request->input('quantity'),
            'name' => $request->input('name'), // Save the 'name' field
        ]);
    
        // Update the product's quantity
        $product->quantity += $request->input('quantity');
        $product->save();
    
        // Log the restock
        Log::info('Restocked ' . $product->name . ' with ' . $request->input('quantity') . ' units.');
    
        return redirect()->route('restocks.index')
            ->with('success', 'Restock created successfully.');
    }
    
    

    public function show(Restock $restock)
    {
        return view('restocks.show', compact('restock'));
    }

    public function destroy(Restock $restock)
{
    // Decrease the product's quantity
    $product = $restock->product;
    $product->quantity -= $restock->submitted_quantity;
    $product->save();

    // Delete the restock record
    $restock->delete();

    return redirect()->route('restocks.index')
        ->with('success', 'Restock deleted successfully.');
}

}
