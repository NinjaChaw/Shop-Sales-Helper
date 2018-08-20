@extends('layouts.app')

@section('content')

    @foreach($categories as $category)
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    {{ $category->name }}
                </div>
                <div class="panel-body">
                    <h3>Total product: <br>{{ $category->products->count() }}</h3>
                </div>
            </div>
        </div>
    @endforeach

@endsection