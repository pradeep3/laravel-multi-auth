<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\ListGroup;

class AdminController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        $listGroup = ListGroup::all();
        return view('admin', compact('listings', 'listGroup'));
    }
}
