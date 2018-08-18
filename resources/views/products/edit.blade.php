@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit product: {{ $product->name }}
        </div>

        <div class="panel-body">
            <form action="{{ route('products.update', $product->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category_id">Select Product Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="brand">Product Brand</label>
                    <input type="text" name="brand" value="{{ $product->brand }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success center-block">Update Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
