@extends('layouts.app')

@section('content')

    @if(Auth::user()->role === 'admin')
        <div class="panel panel-success">
            <h1 class="text-center">Welcome ADMIN!</h1>
        </div>
    @endif

    @if(Auth::user()->role === 'subscriber')
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <p>Thank you for login!</p>
            </div>
            <div class="panel-footer text-center">
                <p>Please wait for admin approval to become a sales person</p>
            </div>
            <div class="panel-body text-center">
                <a href="visitor" class="btn btn-info">Or, you can enjoy here..</a>
            </div>
        </div>
    @endif

    @if(Auth::user()->role === 'saler')
        <div class="panel panel-success">
            <div class="panel-heading text-center">Thank you for login!</div>
            <div class="panel-footer text-center">
                You are a sales person
            </div>
        </div>
    @endif

@endsection
