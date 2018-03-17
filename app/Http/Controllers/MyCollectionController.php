<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\MyCollection;
use App\ListGroup;

class MyCollectionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'list_id' => 'required',
            'group_id' => 'required'
        ]);
        $matchcase = ['list_id' => $request->get('list_id'), 'group_id' => $request->get('group_id')];
        $my = MyCollection::where($matchcase)->get();
        if($my->count() > 0) {
            session()->flash('warn', 'Already Added to this collection!');   
        } else {
            $myCollection = new MyCollection();
            $myCollection->list_id = $request->get('list_id');
            $myCollection->group_id = $request->get('group_id');
            $myCollection->user_id = Auth::user()->id;
            $myCollection->save();
            session()->flash('status', 'Added to collection!');
        }
        
        return response('success', 204);
    }

    public function allCollection()
    {
        $groups = ListGroup::where('user_id', Auth::user()->id)
                        ->with('users')->get();
        
        $collections = MyCollection::where('user_id', Auth::user()->id)->with('listings')->get();
        
        return view('collection.index', compact('groups', 'collections'));
    }
}
