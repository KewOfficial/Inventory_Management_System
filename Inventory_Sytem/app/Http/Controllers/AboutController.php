<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View; // Add this line for View

class AboutController extends Controller
{
    /**
     * Show the about us page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('about.about'); // Load the about.blade.php view
    }
}
