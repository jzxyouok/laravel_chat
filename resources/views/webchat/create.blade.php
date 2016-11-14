@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create web chat room</h2>
        <form class="form-horizontal" action="/webchat/store" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-10">
                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Room title">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pic">Attach Picture:</label>
                <div class="col-sm-10">
                    <input name="pic" type="file" class="form-control" id="pic">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="sel1">Users that can see:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="sel1">
                        <option>Guests</option>
                        <option>Authorized users</option>
                        <option>Special Private Room</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Create</button>
                </div>
            </div>
        </form>

        <!-- ------------------------- -->
        @if (session()->has('errors'))
            @foreach(session('errors')->all() as $error)
                <div class="alert alert-warning">
                    <strong>Warning! </strong> {{ $error }}
                </div>
            @endforeach
        @elseif (session()->has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong>{{ session('success') }}
            </div>
        @endif
        <!-- ------------------------- -->

    </div>

@endsection