<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebchatController extends Controller
{
    //
    public function index()
    {
        return view('webchat.index');
    }

    public function create()
    {
        return view('webchat.create');
    }

    public function store(Request $request)
    {
        //

    }

    public function show($id)
    {
        dd('Chat room id: ' . $id);
    }
}
