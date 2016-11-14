<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WebchatController extends Controller
{
    // ---------------------------------------------------------------------------------------------------
    public function index()
    {
        return view('webchat.index');
    }

    // ---------------------------------------------------------------------------------------------------
    public function create()
    {
        if (!session()->has('errors')) {
            session( ['success', 'Good, your room created !!!'] );
        }

        if (!Auth::guest()) {
            return view('webchat.create');
        } else {
            return redirect('/register');
        }
    }

    // ---------------------------------------------------------------------------------------------------
    public function store(Request $request)
    {
        // validations rules --------------------------------------
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:rooms|max:255',
            'pic'   => 'required|mimes:jpeg,jpg,png,gif|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect('webchat/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Model (insert) ------------------------------------------
        $room = new Room();
        $room->title = ucfirst($request->title);
        $room->user_id = Auth::id();
        $room->status = $request->status;

        $image = ( Auth::id() . time() . $request->file('pic')->getClientOriginalName() );
        $room->image = $image;

        if ($request->status = 'special_private_room') {
            // generate reference pecial_private_room
            $random = ( Auth::id() . time() . uniqid() );
            $room->reference = $random;
        }

        /*$request->file('pic')->storeAs(
            'public/cv_dir',
            $request->file('pic')->getClientOriginalName()
        );*/

        $request->file('pic')->move( public_path('images'), $image );
        $room->save();

        return redirect('/');
    }

    // ---------------------------------------------------------------------------------------------------
    public function showAll()
    {
        if (Auth::guest()) {

            $rooms = Room::where('status', 'guests')
                ->orderBy('title', 'asc')
                ->get();

        } else {
            $rooms = Room::all();
        }

        // dd( $rooms );

        return view('webchat.show_all', ['rooms' => $rooms]);
    }
}
