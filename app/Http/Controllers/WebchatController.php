<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WebchatController extends Controller
{
    //
    public function index()
    {
        return view('webchat.index');
    }

    public function create()
    {
        if (!session()->has('errors')) {
            session( ['success', 'Good, your room created !!!'] );
        }

        return view('webchat.create');
    }

    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:rooms|max:255',
            'pic'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('webchat/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // insert

        }
    }

    public function show($id)
    {
        dd('Chat room id: ' . $id);
    }
}
