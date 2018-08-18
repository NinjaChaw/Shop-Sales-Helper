@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update category: {{ $category->category }}
        </div>

        <div class="panel-body">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="category">Category name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success center-block">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
