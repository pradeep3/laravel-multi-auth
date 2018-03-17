<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Listing;

class ListingController extends Controller
{
    public function create() 
    {
        return view('list.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $listing = new Listing;
        $listing->name = $request->get('name');
        $listing->description = $request->get('description');
        $listing->user_id = Auth::user()->id;
        $listing->save();

        return redirect('admin')->with('status', 'Listting added !');

    }
}
