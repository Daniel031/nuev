<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">



</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="#">
            <img src="https://i.pinimg.com/originals/c1/59/44/c15944a1340e369d78f2cada60045fcc.png" alt="LOGO"
                class="img-responsive img-thumbnail is-centered" style="width: 80px; ">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb"
            aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navb" class="navbar-collapse collapse hide">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('quienes')}}">¿Quienes somos?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Nutricionistas</a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Salud y Bienestar
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><button class="dropdown-item" type="button">Alimentos saludables</button></li>
                        <li><button class="dropdown-item" type="button">Deportes</button></li>
                    </ul>
                </div>
            </ul>

            <ul class="nav navbar-nav ml-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><span class="fas fa-user px-1"></span>Registrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><span class="fas fa-sign-in-alt px-1"></span>Ingresar</a>
                </li> --}}
                @if (Route::has('login'))

                    <li class="nav-item">
                        @auth
                            <a href="{{ url('/admin') }}" class="nav-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link"><span
                                    class="fas fa-sign-in-alt px-1"></span>Login</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class=" nav-link"><span
                                        class="fas fa-user px-1"></span>Register</a>
                            @endif
                    @endif
                    </li>
                    @endif
                </ul>
            </div>

        </nav>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        -->
        <style>
            .carousel-inner img {
                width: 100%;
                max-height: 550px;
            }

            .carousel-inner {
                height: 500px;
            }

        </style>


        <div id="carouselExampleIndicators" class="carousel slide carousel-inner img-size-50" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://assets-global.website-files.com/5f4f67c5950db17954dd4f52/5f5b77df96e7eead076f2a05_nutricion-p-1600.jpeg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://padelstar.es/wp-content/uploads/2014/07/Consejos-de-Nutricion-para-Jugadores-de-Padel-600x338.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://labuenanutricion.com/wp-content/uploads/2020/07/cuando-debe-comer-un-ni%C3%B1o-menos-de-5.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </body>

</html>
