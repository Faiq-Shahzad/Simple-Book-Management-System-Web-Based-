<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cineplex | Screening Movies | Booking Tickets | And Much More</title>

    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shizuru&display=swap" rel="stylesheet">

    <style>

        @media (max-width: 1600px){
            body{
                background: url('https://cdn.wallpapersafari.com/83/55/WbvsGD.jpg') no-repeat center fixed;
                background-size: cover;
            }

            span{
                font-family: 'Shizuru', cursive;
            }

            .row{
                --bs-gutter-x: 0rem
            }

            img{
                width: 50%;
                align-self: center;
            }

            h3{
                color: black;
                text-align: center;
                padding-top: 10%; 
            }

            hr {
                border: none;
                border-top: 3px double black;
                color: red;
                overflow: visible;
                text-align: center;
                height: 5px;
            }

            hr:after {
                background: black;
                content: 'OR';
                color: white;
                font-size: 16px;
                padding: 0 4px;
                position: relative;
                top: -13px;
            }

            .main{
                margin-top: 12%;
                margin-left: 4%;
                border: 5px groove red;
            }

            p{
                color: white;
                text-align: center;
            }
        }

        @media (max-width: 767px){
            body{
                background-image: url('https://wallpapercave.com/wp/wp5580040.jpg');
                background-size: cover;
            }

            .main{
                border: none;
                margin-left: auto;
                margin-right: auto;
                padding-left: 2%;
                padding-right: 2%;
            }
        }


    </style>
</head>
<body>

    <div class="main col-lg-4">

        <br>

        <div class="row">
            <h3 class="col-lg-12">Welcome to <span>BOOKPLEX</span></h3>
        </div>

        <br>
        <br>

        @if (Route::has('login'))
            <div class="row">
                @auth
                    <a href="{{ url('/home') }}"><button type="button" class="btn btn-secondary col-lg-10 offset-lg-1 col-12">Home</button></a>
                    <p class="col-lg-10 offset-lg-1 col-12">You are Already logged In!</p>
                @else
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-success col-lg-10 offset-lg-1 col-12">Login</button></a>
            </div>

            <br>
            <hr class="col-lg-10 offset-lg-1 col-12">
            <br>

            <div class="row">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><button type="button" class="btn btn-primary col-lg-10 offset-lg-1 col-12">Register</button></a>
                    {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> --}}
                @endif
            @endauth
            </div>

            <br>
        @endif
    </div>
</body>
</html>