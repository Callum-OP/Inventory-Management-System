<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory Management System</title>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css" /> 

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <!-- Main Menu -->
                <div class="title">
                    Inventory Management System
                </div>
                <div class="links">
                    <a href="inventory/"><b>Access Inventory</b></a>
                    <a href="stock/"><b>Order Stock</b></a>
                    <a href="sales/"><b>Sales</b></a>
                </div>

                <div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
