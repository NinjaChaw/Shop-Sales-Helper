@extends('layouts.app')

@section('content')

    <div class="panel panel-success">
        <div class="panel-info text-center">
            <img src="{{ asset($product->image) }}" alt="{{ asset($product->name) }}" height="400px" width="600px">
        </div>
        <div class="panel-heading text-center">
            <h3>Category: {{ $product->category->name }}</h3>
            <h3>Name: {{ $product->name }}</h3>
            <h3>Brand: {{ $product->brand }}</h3>
            <h3>Price: ${{ $product->price }}</h3>
        </div>
        <div class="panel-footer text-center">
            <a href="{{ route('product.sold', $product->id) }}" class="btn btn-info">Mark this product as Sold and cash received</a>
        </div>
    </div>

@endsection
