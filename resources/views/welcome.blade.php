<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Perro y Gato</title>

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh;
                margin: 0; */
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .product img {
                height: 250px;
            }
            .price{
                color: #e85f99;
            }
        </style>
    </head>
    <body>
        <div class="flex-center">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                    |
                    <a href="https://www.facebook.com/perroygatozc/" target="_blank"><i class="ion-social-facebook"></i> Facebook</a>
                </div>
            @endif

            <div class="content mt-5">
                <img class="brand-img img-circle" height="150px" src="template/img/perro.jpg">
                <h1>
                    <b style="color: #e85f99">Perro</b> <small>y</small> <b style="color: #dddddd;">Gato</b>
                </h1>
                {{-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
                <hr>
            </div>
        </div>
        <div class="container">
            <h2>FEATURED PRODUCTS</h2>
            {{-- <h1>Our Products</h1> --}}
            <div class="row">
                @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card">
                        <div class="product">
                            <img class="card-img-top" src="images/{{$product->image}}" alt="Bologna">
                        </div>
                      <div class="card-body">
                        <h4 class="card-title product">{{$product->product}}</h4>
                        {{-- <h6 class="card-subtitle mb-2 text-muted">Subtitle</h6> --}}
                        <p class="card-text">{{$product->description}}</p>
                        <h1 class="price">₱{{$product->price}}</h1>
                        {{-- <a href="#" class="card-link">Read More</a>
                        <a href="#" class="card-link">Book a Trip</a> --}}
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- REQUIRED SCRIPTS -->
        <script src="/js/app.js"></script>
    </body>
</html>
