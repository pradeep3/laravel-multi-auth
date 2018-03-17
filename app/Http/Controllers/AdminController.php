<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class AdminController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return view('admin', compact('listings'));
    }
}
