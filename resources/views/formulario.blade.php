<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Formulario de Asistencia</title>
</head>
@section('content')
<body>
    <header>
        <div class="container "> 
            <div class="col text-center">
                <h1 style="font-weight: bold; font-size: 48px">Formulario de Toma de Asistencia</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="/asistencia/descargar" method="POST" class="text-center" style="margin:auto">
                        {{ csrf_field() }}
                        <label for="fecha" style="margin-left: auto">Ingrese una fecha:</label>
                        <input type="date" id="fecha" name="fecha" style="width: 200px; margin-left: auto">
                        <p></p>

                        <select data-column="4" class="form-control filter-select" style="width: 300px">
                            <option value="">Seleccionar instalación</option>
                            @foreach ($insta as $i)
                                <option value="{{$i['nombre_insta']}}">{{$i['nombre_insta']}}</option>
                            @endforeach
                        </select>

                        <table id="myTable" name="myTable" class="table table-striped table-bordered">
                            <thead>
                                <th >Nombre</th>
                                <th>RUT</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Instalación</th>
                                <th>Ocurrencia</th>
                            </thead>
                            <tbody>
                                @foreach ($empleado as $emp)
                                <tr>
                                    <td>{{$emp['nombre']}}</td>
                                    <td>{{$emp['RUT']}}</td>
                                    <td>{{$emp['email']}}</td>
                                    <td>{{$emp['telefono']}}</td>
                                    <td>{{$emp['instalacion']}}</td>
                                    <td style="width: 220px">
                                        <select class="form-select form-select" name="ocurrencia" id="ocurrencia" style="margin-left: auto" aria-label=".form-select example" style="font-size: 14">
                                            <option selected value="Asiste">Asiste</option>
                                            <option value="Falta"> Falta</option>
                                            <option value="Falta justificada"> Falta justificada</option>
                                            <option value="Bono por sobre esfuerzo y reemplazo"> Bono por sobre esfuerzo y reemplazo</option>
                                            <option value="Licencia"> Licencia</option>
                                            <option value="Licencia Provisoria"> Licencia Provisoria</option>
                                            <option value="Vacaciones"> Vacaciones</option>
                                            <option value="Suspensión"> Suspensión</option>
                                            <option value="Permiso sin Goce"> Permiso sin Goce</option>
                                            <option value="Permiso con goce"> Permiso con goce</option>
                                        </select>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> 
                        <p></p>
                            
                        <button type="submit" class="btngestionar" style="margin-left: auto; width: 80px; height: 40px">Enviar</button>
                    </form>

                </div>
            </div>
        </div>
    
    </div>
    
    <script>

        
    $(document).ready(function() {

        var table= $('#myTable').DataTable({
            'processing': true,
            'serverSide': true,
            
            'columns': [
                {'data': 'instalacion'}
            ],
        });

        $('.filter-select').change(function() {
            table.column( $(this).data('column') )
                .search( $(this).val() )
                .draw();

        });


    });


        // Data Picker Initialization
        $('.datepicker').datepicker();
        
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