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
            <div class="col-md-10">
                <div class="card">
                    <div class="col" style="margin-left: auto">
                        <button type="button" class="btngestionar" data-bs-toggle="modal" data-bs-target="#modal_create" style="width: 170px; height: 30px">
                            Agregar empleado
                        </button>
                        <a href="/descargar_instalacion"> <button type="button" class="btngestionar" style="width: 100px; height: 30px">Descargar</button></a>
                        <p></p>
                    </div>
                    <table id="empleados" class="table table-striped table-bordered">
                        <thead>
                            <th >Nombre</th>
                            <th>RUT</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Instalación</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($empleado as $emp)
                            <tr>
                                <td>{{$emp['nombre']}}</td>
                                <td>{{$emp['RUT']}}</td>
                                <td>{{$emp['email']}}</td>
                                <td>{{$emp['telefono']}}</td>
                                <td>{{$emp['instalacion']}}</td>
                                <td>{{$emp['Cargo']}}</td>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div tabindex="-1" class="modal fade" id="modal_create" aria-labelledby="modalCreateLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <form action="crear_emp" method="post" class="form-group">
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
                                        <input type="name" class="form-control form-control-lg" name="nombre" placeholder="Ingrese el nombre del empleado"/>
                                    </div>  
                                    <div class="form-group" style="margin: auto">
                                        <label for="">RUT</label>
                                        <input type="name" class="form-control form-control-lg" name="RUT" placeholder="Ingrese el RUT del empleado"/>
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

                                        <select class="form-select form-select-lg" name="instalacion" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                            @foreach ($insta as $i)
                                                <option selected value="{{$i['nombre_insta']}}"> {{$i['nombre_insta']}}</option>
                                            @endforeach
                                        </select>
                                    </div>       

                                    <div class="form-group" style="margin: auto">
                                        <label for="">Cargo</label>

                                        <select class="form-select form-select-lg" name="cargo" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                                <option selected value="Técnico de Aseo"> Técnico de Aseo</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Recursos Humanos">Recursos Humanos</option>
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


     <!-- Modal Eliminar Empleado-->
     <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div tabindex="-1" class="modal fade" id="modal_del" aria-labelledby="modalDelLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form action="/empleados" method="post" class="form-group" id="deleteForm">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                                Eliminar Empleado
                                            </h1>
                                        </div>

                                        <div class="modal-body">
                                            ¿Está seguro de que desea eliminar a éste empleado?     
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

        <!-- Modal Modificar Empleado-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div tabindex="-1" class="modal fade" id="modal_edit" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form action="/empleados" method="post" class="form-group" id="editForm">
                                {{ csrf_field() }}
                                {{ method_field('PUT')}}  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 50; margin: auto">
                                            Editar Empleado
                                        </h1>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Nombre</label>
                                            <input type="name" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="Ingrese el nombre del empleado"/>
                                        </div>
                                        <div class="form-group" style="margin: auto">
                                            <label for="">RUT</label>
                                            <input type="name" class="form-control form-control-lg" name="RUT" id="RUT" placeholder="Ingrese el RUT del empleado"/>
                                        </div>  
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Correo Electrónico</label>
                                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Ingrese el correo del empleado"/>
                                        </div>
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Teléfono</label>
                                            <input type="string" class="form-control form-control-lg" name="telefono" id="telefono" placeholder="Ingrese el correo del empleado"/>
                                        </div>
                                        <div class="form-group" style="margin: auto">
                                            <label for="">Instalación</label>

                                            <select class="form-select form-select-lg" name="instalacion" id ="insta" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                                @foreach ($insta as $i)
                                                    <option selected value="{{$i['nombre_insta']}}"> {{$i['nombre_insta']}}</option>
                                                @endforeach
                                            </select>
                                        </div>       

                                        <div class="form-group" style="margin: auto">
                                            <label for="">Cargo</label>

                                            <select class="form-select form-select-lg" name="cargo" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                                                    <option selected value="Técnico de Aseo"> Técnico de Aseo</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                    <option value="Recursos Humanos">Recursos Humanos</option>
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

            var table= $('#empleados').DataTable();

            //modificar
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                
                $('#nombre').val(data[0]);
                $('#RUT').val(data[1]);
                $('#email').val(data[2]);
                $('#telefono').val(data[3]);
                $('#insta').val(data[4]);
                $('#cargo').val(data[5]);

                $('#editForm').attr('action', '/empleados/' + data[1]);
                $('#modal_edit').modal('show');

            });
            //eliminar

            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                

                $('#deleteForm').attr('action', '/empleados/' + data[1]);
                $('#modal_del').modal('show');

            });


        });


    </script>
</body>
@endsection
</html>