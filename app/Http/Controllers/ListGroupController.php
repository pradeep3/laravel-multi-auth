<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ListGroup;

class ListGroupController extends Controller
{
    public function create() 
    {
        return view('group.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required'
        ]);

        $listGroup = new ListGroup;
        $listGroup->name = $request->get('name');
        $listGroup->user_id = Auth::user()->id;
        $listGroup->save();

        return redirect('admin')->with('status', 'List Group added !');

    }
}
