<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    //
    public function videochatPage() {
        return view('home.broadcast');
    }
}
