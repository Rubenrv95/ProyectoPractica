<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--Scripts Jquery y Datatables -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Styles de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div id="app">
        <header>
            <!-- Barra Superior-->
            <nav id="barra" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="/home">
                        <div class="logo-image">
                            <img style="width: 200px; height: 60px" src="/images/logo2.png" alt="">
                        </div>
                    </a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">

                            @guest

                                @if (Route::has('register'))
                                    
                                @endif
                            @else
                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" style="font-size: 22px" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->nombre }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal"
                                            onclick="event.preventDefault();">
                                            {{ __('Ver Datos de Perfil') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Modal Ver Usuario-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div tabindex="-1" class="modal fade" id="modal" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT')}}  
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                                Datos de Usuario
                                            </h1>
                                        </div>

                                        <div class="modal-body">
                                            <div style="margin: auto">
                                                <label for="">{{ Auth::user()->nombre }}</label>
                                            </div>  
                                            <div style="margin: auto">
                                                <label for="">{{ Auth::user()->email }}</label>
                                            </div>
                                            <div style="margin: auto">
                                                <label for="">{{ Auth::user()->tipo }}</label>
                                            </div>         
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <section>
            <div class="container">

                @guest

                @if (Route::has('welcome'))
                                    
                @endif
                @else

                <div class="col text-center">
                    <!-- Barra de Navegación-->
                    <nav class="navbar navbar-expand-sm" style="background-color: transparent; height: 35px">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item  text-center" style="" >
                                    <a class="nav-link" href="/home" style="font-size: 20px; color:black; width:59px">
                                        <button type="button" class="btnNav" style="width: 59px">Inicio</button>
                                    </a>
                                    </li>
                                    <li class="nav-item  text-center" style="" >
                                    <a class="nav-link" href="/usuarios" style="font-size: 20px; color:black; width:87px">
                                        <button type="button" class="btnNav"  style="width: 87px">Usuarios</button>
                                    </a>
                                    </li>
                                    <li class="nav-item text-center" style="">
                                    <a class="nav-link" href="/instalaciones" style="font-size: 20px; color:black; width:125px">
                                        <button type="button" class="btnNav"  style="width: 125px">Instalaciones</button> 
                                    </a>
                                    </li>
                                    <li class="nav-item text-center" style="">
                                    <a class="nav-link" href="/empleados" style="font-size: 20px; color:black; width:115px">
                                        <button type="button" class="btnNav" style="width: 115px">Empleados</button></a>
                                    </li>
                                    
                                    <li class="nav-item text-center" style="">
                                    
                                    <a class="nav-link" href="/asistencia" style="font-size: 20px; color:black; width:114px">
                                        <button type="button" class="btnNav" style="width: 114px">Asistencia</button></a>
                                    </li>
                                    <li class="nav-item text-center" style="">
                                    <a class="nav-link" href="/reportes" style="font-size: 20px; color:black; width:110px">
                                        <button type="button" class="btnNav" style="width: 110px">Reportes</button></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>                    
                </div>

                @endguest
            </div>
            @yield('content')
        </section>       
    </div>
</body>
</html>
