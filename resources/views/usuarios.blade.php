
@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     
    <head>
        <title>Listado de Usuarios</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">        
        
    </head>
    @section('content')
    <body>

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Listado de Usuarios</h1>
            </div>
            <button type="button" class="btngestionar" data-bs-toggle="modal" data-bs-target="#modal_create" style="width: 150px; height: 30px;">
                Agregar usuario
            </button>
            <a href="/usuarios_descarga"> <button type="button" class="btngestionar" style="width: 130px; height: 30px">Exportar todo</button></a>
            <p></p>

            <form action="/usuarios/importar" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file"/>
                    <button type="file" class="btngestionar" style="width: 100px; height: 30px"> Importar </button>
                </div>
            </form>
            <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <th>Nombre</th>
                    <td>Correo Electrónico</td>
                    <td>Tipo</td>
                    <td>Acciones</td>
                </thead>

                <tbody>
                    @foreach ($usuario as $user)
                    <tr>
                        <td> {{$user['nombre']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['tipo']}}</td>
                        <td>
                            <button type="button" id="edit" data-bs-toggle="modal" data-bs-target="#modal_edit" class="edit"></button>
                            <button type="button" id="delete" data-bs-toggle="modal" data-bs-target="#modal_del" class="delete"></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


        <!-- Modal Eliminar Usuario-->
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div tabindex="-1" class="modal fade" id="modal_del" aria-labelledby="modalDelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form action="/usuarios" method="post" class="form-group" id="deleteForm">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                                Eliminar Usuario
                                            </h1>
                                        </div>

                                        <div class="modal-body">
                                            ¿Está seguro de que desea eliminar a éste usuario?     
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Modal Modificar Usuario-->
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div tabindex="-1" class="modal fade" id="modal_edit" aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form action="/usuarios" method="post" class="form-group" id="editForm">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT')}} 
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                                Editar Usuario
                                            </h1>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group" style="margin: auto">
                                                <label for="">Nombre</label>
                                                <input type="name" class="form-control form-control-lg" name="nombre_user" id="nombre_user" placeholder="Ingrese el nombre del empleado"/>
                                            </div>  
                                            <div class="form-group" style="margin: auto">
                                                <label for="">Correo Electrónico</label>
                                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Ingrese el correo del empleado"/>
                                            </div>
                                            <div class="form-group" style="margin: auto">
                                                <label for="">Tipo de empleado</label>
                                                <select class="form-select form-select-lg" name="tipo" id="tipo" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                                    <option selected value="Supervisor">Supervisor</option>
                                                    <option selected value="Recursos Humanos">Recursos Humanos</option>
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

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    



        <script>
            $(document).ready(function() {

                var table= $('#usuarios').DataTable();

                //modificar
                table.on('click', '.edit', function() {
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    
                    $('#nombre_user').val(data[0]);
                    $('#email').val(data[1]);
                    $('#tipo').val(data[2]);

                    $('#editForm').attr('action', '/usuarios/' + data[0]);
                    $('#modal_edit').modal('show');

                });
                //eliminar

                table.on('click', '.delete', function() {
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    

                    $('#deleteForm').attr('action', '/usuarios/' + data[0]);
                    $('#modal_del').modal('show');

                });


            });


        </script>
    </body>

    <footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <p></p>
                    <p style="color: black; font-style: bold">Union Global Services @ 2022</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</footer>

    @endsection
</html>



@include('modals.modal_crear_user')