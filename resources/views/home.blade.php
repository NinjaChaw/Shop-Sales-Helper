@extends('layouts.app')

@section('content')

    @if(Auth::user()->role === 'subscriber')
        <div class="panel panel-success">
            <div class="panel-heading text-center">Thank you for login!</div>
            <div class="panel-footer text-center">
                Please wait for admin approval to become a sales person
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
