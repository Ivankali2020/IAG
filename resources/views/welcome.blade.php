<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Interview</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <style>
            body {
                font-family: 'Bebas Neue', cursive , sans-serif;
            }
        </style>
    </head>
    <body >
    <div class="container">
        <div class="row align-items-center min-vh-100 ">
            <div class="col-8 mx-auto">
                <div class="card border-0 shadow-sm " style="border-radius: 20px">
                    <div class="card-body text-center">
                        <h1 class="fw-bolder mb-0 mt-3 " style="letter-spacing: .5rem">Welcome</h1>
                        <p style="letter-spacing: .2rem">to my interview assignment</p>

                        <img width="50%" src="https://cdn3d.iconscout.com/3d/free/thumb/google-5148287-4299203.png" alt="">

                        <div class="mb-4">
                            @auth
                                <a href="{{ route('home') }}" class="btn btn-primary px-4 " style="letter-spacing: .3rem">
                                    Home
                                </a>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-primary px-4 " style="letter-spacing: .3rem">
                                    Login
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
