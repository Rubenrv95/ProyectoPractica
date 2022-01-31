
@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     
    <head>
        <title>Listado de Instalaciones</title>

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
                    <h1 style="font-weight: bold; font-size: 48px">Listado de Instalaciones</h1>
                </div>
            </div>
        </header>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="col" style="margin-left: auto">
                            <button type="button" class="btngestionar" data-bs-toggle="modal" data-bs-target="#modal_create" style="width: 170px; height: 30px">
                                Agregar Instalación
                            </button>
                            <p></p>
                        </div>              
                        <table id="instalaciones" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>ID</th>
                                <td>Nombre</td>
                                <td>Dirección</td>
                                <td>Dotación</td>
                                <td>Acciones</td>
                            </thead>

                            <tbody>
                                @foreach ($instalacion as $i)
                                <tr>
                                    <td>{{$i['id']}}</td>
                                    <td>{{$i['nombre_insta']}}</td>
                                    <td>{{$i['Direccion']}}</td>
                                    <td>{{$i['Dotacion']}}</td>
                                    <td>
                                        <button type="button" id="edit" data-bs-toggle="modal" data-bs-target="#modal_edit" class="edit"></button>
                                        <button type="button" id="delete" data-bs-toggle="modal" data-bs-target="#modal_del" class="delete"></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Eliminar Usuario-->
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div tabindex="-1" class="modal fade" id="modal_del" aria-labelledby="modalDelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form action="/instalaciones" method="post" class="form-group" id="deleteForm">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                                Eliminar Instalación
                                            </h1>
                                        </div>

                                        <div class="modal-body">
                                            ¿Está seguro de que desea eliminar ésta instalación?     
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
                            <form action="/instalaciones" method="post" class="form-group" id="editForm">
                                {{ csrf_field() }}
                                {{ method_field('PUT')}}  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                            Editar Instalacion
                                        </h1>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Nombre</label>
                                            <input type="name" class="form-control form-control-lg" name="nombre_insta" id="nombre_insta" placeholder="Ingrese el nombre de la instalación"/>
                                        </div>  
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Dirección</label>
                                            <input type="name" class="form-control form-control-lg" name="direccion" id="direccion" placeholder="Ingrese la dirección de la instalación"/>
                                        </div>
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Dotación</label>
                                            <input type="number" class="form-control form-control-lg" style="width: 100px" name="dotacion" id="dotacion"/>
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

                var table= $('#instalaciones').DataTable();

                //modificar
                table.on('click', '.edit', function() {
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    
                    $('#nombre_insta').val(data[1]);
                    $('#direccion').val(data[2]);
                    $('#dotacion').val(data[3]);

                    $('#editForm').attr('action', '/instalaciones/' + data[0]);
                    $('#modal_edit').modal('show');

                });
                //eliminar

                table.on('click', '.delete', function() {
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    

                    $('#deleteForm').attr('action', '/instalaciones/' + data[0]);
                    $('#modal_del').modal('show');

                });


            });


        </script>
    </body>

    @endsection
</html>



@include('modals.modal_crear_instalacion')