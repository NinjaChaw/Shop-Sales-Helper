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

    {{--@if(Session::has('success'))--}}
        {{--<div class="alert alert-success" style="margin: 0px; ">--}}
            {{--{{ session('success') }}--}}
        {{--</div>--}}
    {{--@endif--}}

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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            <div class="row">

                @if(Auth::check())
                    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'saler')
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @if(Auth::user()->role === 'admin')
                                        <h4>You are an admin</h4>
                                    @endif
                                    @if(Auth::user()->role === 'saler')
                                        <h4>You are a sales person</h4>
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group">

                                        @if(Auth::check())
                                            {{--Only for admin use--}}
                                            @if(Auth::user()->role === 'admin')
                                                <li class="list-group-item">
                                                    <a href="{{ route('users') }}">All Users</a>
                                                </li>
                                                <br>
                                                <li class="list-group-item">
                                                    <a href="{{ route('category') }}">All categories</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('category.create') }}">Create new category</a>
                                                </li>
                                                <br>
                                                <li class="list-group-item">
                                                    <a href="{{ route('products') }}">All products</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('products.create') }}">Upload new product</a>
                                                </li>
                                            @endif
                                            {{--Admin and saler can use--}}
                                            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'saler')
                                                <br>
                                                <p>Sales Person links</p>
                                                <br>
                                                <li class="list-group-item">
                                                    <a href="{{ route('sale.all') }}">Sale Market</a>
                                                </li>
                                            @endif
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="col-md-8">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                toastr.success
                        {{--{{ Session::get('success') }}--}}
                ('{{ Session::get('success') }}');
            });
        </script>
    @endif

</body>
</html>
