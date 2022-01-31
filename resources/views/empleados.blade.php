@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>

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
                <h1 style="font-weight: bold; font-size: 48px">Listado de Empleados</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="col" style="margin-left: auto">
                        <button type="button" class="btngestionar" data-bs-toggle="modal" data-bs-target="#modal_create" style="width: 170px; height: 30px">
                            Agregar empleado
                        </button>
                        <p></p>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th >Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Instalación</th>
                        </thead>
                        <tbody>
                            @foreach ($empleado as $emp)
                                <?php 
                                    $emp = get_object_vars($emp);
                                    $nombre = $emp['nombre'];
                                    $email = $emp['email'];
                                    $telefono = $emp['telefono'];
                                    $instalacion = $emp['nombre_insta'];
                                ?>
                            <tr>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $telefono ?></td>
                                <td><?php echo $instalacion ?></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>        
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div tabindex="-1" class="modal fade" id="modal_create" aria-labelledby="modalCreateLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <form action="" method="post" class="form-group">
                        @csrf 
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                    Agregar Empleado
                                </h1>
                            </div>

                            <div class="modal-body">
                                <div class="form-group" style="margin: auto">
                                    <label for="">Nombre</label>
                                    <input type="name" class="form-control form-control-lg" name="nombre_user" placeholder="Ingrese el nombre del empleado"/>
                                </div>  
                                <div class="form-group" style="margin: auto">
                                    <label for="">Correo Electrónico</label>
                                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Ingrese el correo del empleado"/>
                                </div>
                                <div class="form-group" style="margin: auto">
                                    <label for="">Teléfono</label>
                                    <input type="string" class="form-control form-control-lg" name="telefono" placeholder="Ingrese el correo del empleado"/>
                                </div>
                                <div class="form-group" style="margin: auto">
                                    <label for="">Instalación</label>

                                    <select class="form-select form-select-lg" name="tipo" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                        @foreach ($insta as $i)
                                            <option selected value="{{$i['id']}}"> {{$i['nombre_insta']}}</option>
                                        @endforeach
                                    </select>
                                </div>       
                                       
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
</html>