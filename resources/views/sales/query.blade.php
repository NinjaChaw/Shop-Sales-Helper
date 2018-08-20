<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <form action="{{ route('search.products') }}" method="post" role="search">
        {{ csrf_field() }}
        <div class="center-block" style="width: 50%">
            <div class="input-group">
                <input type="text" class="form-control" name="query" placeholder="Search here">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            @if($categories->count() > 0)
                <h2 class="text-center alert-info">Search result for: "{{ $q }}"</h2>
                <br>
                @foreach($categories as $category)
                    @foreach($category->products as $product)
                        <div class="panel">
                            <div class="row col-md-offset-2">
                                <div class="col-md-4">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" height="170px" width="270px" style="border-radius: 20px">
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Product Specification
                                        </div>
                                        <div class="panel-body">
                                            <span>Product Category: </span><strong>{{ $product->category->name }}</strong>
                                            <br>
                                            <span>Product Name: </span><strong>{{ $product->name }}</strong>
                                            <br>
                                            <span>Product Brand: </span><strong>{{ $product->brand }}</strong>
                                            <br>
                                            <span>Product Price: </span><strong>${{ $product->price }}</strong>
                                            <br>
                                            <a href="{{ route('sale.product.details', $product->id) }}" class="btn btn-info btn-sm center-block">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                    @endforeach
                @endforeach
            @else
                <h2 class="text-center alert-info">No results found for: "{{ $q }}"</h2>
            @endif
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
