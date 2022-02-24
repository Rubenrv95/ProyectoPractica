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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Styles de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <div id="app">

            @guest

            @if (Route::has('register'))
                
            @endif
            @else
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
            @endguest
    <div id="wrapper">

            
            @guest

            @if (Route::has('register'))
                
            @endif
            @else
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #0dcac2">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <a class="navbar-brand" href="/home">
                        <div class="logo-image">
                            <img style="width: 200px; height: 60px" src="/images/logo2.png" alt="">
                        </div>
                    </a>
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" style="margin:auto">
                <a class="nav-link">
                <img class="img-profile rounded-circle"
                                    src="images/Admin-icon.png" width="25px" height="25px">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ Auth::user()->nombre }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Cuenta
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-bs-toggle="modal" data-bs-target="#modal" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ver Perfil</span>
                </a>
                <a class="nav-link collapsed" href="{{ route('logout') }}" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>{{ __('Cerrar Sesión') }}</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Enlaces
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/usuarios" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Usuarios</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/instalaciones" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Instalaciones</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/empleados" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Empleados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/asistencia" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Asistencia</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/reportes" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Reportes</span>
                </a>
            </li>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>Union Global Services </strong>@ 2022</p>
            </div>

            </ul>
            @endguest
            <!-- End of Sidebar -->

            <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
                <div id="content">
                    @yield('content')
                </div>
            </div>
        </div>       
    </div>
</body>
</html>
