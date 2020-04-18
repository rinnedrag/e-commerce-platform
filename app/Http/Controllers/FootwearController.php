<?php

namespace App\Http\Controllers;


use App\Footwear;
use App\FootwearKind;
use Illuminate\Http\Request;

class FootwearController extends Controller
{
    public function index() {
        //return FootwearKind::all();
        return view('home.index')->with('categories', FootwearKind::all())
            ->with('items', Footwear::all('price','brand','kind','description','photos','id'));
    }
}
