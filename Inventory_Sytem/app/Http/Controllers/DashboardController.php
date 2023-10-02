<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        // Fetch remaining products from the database
        $remainingProducts = DB::table('products')
            ->where('quantity', '>', 0)
            ->get();

        return view('dashboard', compact('remainingProducts'));
    }
}




