@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">        
 
</head>
@section('content')
<body>
    <header>
        <div class="container "> 
            <div class="col text-center">
                <h1 style="font-weight: bold; font-size: 48px">Reportes</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <h1 style="margin:auto">Tabla de Empleados</h1>
                        <table id="empleados" class="table table-striped table-bordered">
                            <thead>
                                <th >Nombre</th>
                                <th>RUT</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Instalación</th>
                                <th>Cargo</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card">
                        <h1 style="margin:auto">Tabla de Usuarios</h1>
                        <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Tipo</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card">
                        <h1 style="margin:auto">Tabla de Usuarios</h1>
                        <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Dotación</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    
</body>
@endsection
</html>