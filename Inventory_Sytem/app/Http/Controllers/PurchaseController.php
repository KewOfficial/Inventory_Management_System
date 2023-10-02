<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('product')->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::all();
        return view('purchases.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1', // Validate quantity field
        ]);

        try {
            $purchase = new Purchase();
            $purchase->product_id = $validatedData['product_id'];
            $purchase->quantity = $validatedData['quantity']; // Store the quantity
            $purchase->save();

            // Update the product's quantity
            $product = Product::find($validatedData['product_id']);
            if ($product) {
                $product->increment('quantity', $validatedData['quantity']); // Increment the quantity by the specified amount
            }

            // Add a success message
            Session::flash('success', 'Purchase created successfully!');
        } catch (\Exception $e) {
            // Handle any errors that occur during purchase creation
            Session::flash('error', 'An error occurred while creating the purchase.');
        }

        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }
}
