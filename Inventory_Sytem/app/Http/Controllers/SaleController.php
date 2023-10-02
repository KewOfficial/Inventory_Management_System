<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Sale;
use App\Models\User;

class SaleController extends Controller
{
    // Display a list of sales
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    // Show the form for creating a new sale
  public function create()
{
    // Fetch the list of products from your database
    $products = Product::all();

    return view('sales.create', compact('products'));
}


    // Store a newly created sale in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity_sold' => 'required|integer|min:1',
            'price_per_unit' => 'required|numeric|min:0.01',
            'product_name' => 'required|string',
        ]);
    
        $product = Product::where('name', $validatedData['product_name'])->first();
    
        if (!$product) {
            return redirect('/sales/create')->with('error', 'Invalid product selected');
        }
    
        if ($product->quantity < $validatedData['quantity_sold']) {
            return redirect('/sales/create')->with('error', 'Not enough quantity in stock');
        }
    
        $totalPrice = $validatedData['quantity_sold'] * $validatedData['price_per_unit'];
        $newQuantity = $product->quantity - $validatedData['quantity_sold'];
        $product->update(['quantity' => $newQuantity]);
    
        $saleData = [
            'quantity_sold' => $validatedData['quantity_sold'],
            'price_per_unit' => $validatedData['price_per_unit'],
            'total_price' => $totalPrice,
            'product_id' => $product->id,
        ];
    
        Sale::create($saleData);
    
        Session::flash('success', 'Sale created successfully');
    
        return redirect('/sales');
    }
    

    // Show the form for editing a sale
    public function edit($id)
    {
        $sale = Sale::find($id);
        $products = Product::all(); // Fetch the products
    
        return view('sales.edit', compact('sale', 'products')); // Pass both sale and products to the view
    }
    

    // Update the specified sale in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer',
            'quantity_sold' => 'required|integer|min:1',
            'price_per_unit' => 'required|numeric|min:0.01',
        ]);
    
        $sale = Sale::find($id);
    
        if (!$sale) {
            return redirect()->back()->with('error', 'Sale not found');
        }
    
        $sale->product_id = $validatedData['product_id'];
        $sale->quantity_sold = $validatedData['quantity_sold'];
        $sale->price_per_unit = $validatedData['price_per_unit'];
        $sale->total_price = $sale->quantity_sold * $sale->price_per_unit;
        $sale->save();
    
        return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
    }
    
}
