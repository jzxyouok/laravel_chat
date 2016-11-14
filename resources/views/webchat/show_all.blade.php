@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @foreach($rooms as $room)

                <div class="col-sm-4">
                    <div class="panel panel-primary">

                        <div class="panel-heading">
                            <a href="#" class="bg-primary">{{ $room->title }}</a>
                        </div>

                        <div class="panel-body">
                            <img src="{{ asset('images/' . $room->image) }}" class="img-responsive" style="width:100%" alt="Image">
                        </div>

                        <div class="panel-footer">
                            Created By {{ $room->user->name }}
                        </div>

                    </div>
                </div>

            @endforeach

        </div>
    </div>

@endsection

