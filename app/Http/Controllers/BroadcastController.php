<?php

namespace App\Http\Controllers;

use App\Adapters\MediaServerAdapter;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function videochatPage() {
        return view('home.broadcast');
    }

    public function saveVideoLink(Request $request) {
        $data = $request->all();
        (new MediaServerAdapter)->saveVideoLink($data['user_id'], $data['admin_id'], $data['filename']);
        return response()->json('successfully created', 201);
    }
}
