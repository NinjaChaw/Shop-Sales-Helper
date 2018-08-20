@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                @foreach($category->products as $product)
                    <div class="col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading text-center">
                                {{ $category->name }}
                            </div>
                            <div class="panel-body text-center">
                                <img src="{{ asset($product->image) }}" width="270px" height="240px">
                                <br>
                                <a href="" class="btn btn-primary" style="width: 100%;">I want to buy this</a>
                            </div>
                            <div class="panel-footer text-center">
                                <span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;<strong>{{ $product->name }}</strong></span>
                                <span>Brand:&nbsp;&nbsp;<strong>{{ $product->brand }}</strong></span>
                                <span class="pull-right">Price:&nbsp;&nbsp;<strong>{{ $product->price }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection