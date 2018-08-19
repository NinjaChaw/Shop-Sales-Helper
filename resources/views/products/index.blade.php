@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            All Products
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Image
                </th>
                <th>
                    Name
                </th>
                <th>
                    Category
                </th>
                <th>
                    Brand
                </th>
                <th>
                    Price
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{ asset($product->image) }}" alt="" height="50px" width="100px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>${{ $product->price }}</td>
                        <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-info">Edit</a></td>
                        <td><a href="{{ route('products.delete', $product->id) }}" class="btn btn-xs btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
