<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; // Add this line for Response

class ContactController extends Controller
{
    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\View\View
zz     */
    public function index()
    {
        return view('contact.contact'); // Load the contact.blade.php view
    }

    /**
     * Handle the contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
}

