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
        <div class="col text-center">
            <div class="card">
                <label for="bday" style="margin-right: auto">Ingrese una fecha:</label>
                <input type="date" id="bday" name="bday" style="width: 200px">
                <label for="" style="margin-right: auto">Seleccionar instalación</label>
                <select class="form-select form-select-lg" name="instalacion" id="instalacion" aria-label=".form-select-lg example" style="width: 470px; margin-bottom: 20px; font-size: 18">
                    @foreach ($insta as $i)
                    <option selected value="{{$i['nombre']}}" placeholder="Seleccionar instalación"> {{$i['nombre']}}</option>
                    @endforeach
                </select>
                
                <p></p>
                <form class="text-center" style="margin:auto">
                    
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                            <th >Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Instalación</th>
                            <th>Ocurrencia</th>
                        </thead>
                        <tbody>
                            @foreach ($empleado as $emp)
                            <tr>
                                <td>{{$emp['nombre']}}</td>
                                <td>{{$emp['email']}}</td>
                                <td>{{$emp['telefono']}}</td>
                                <td>{{$emp['instalacion']}}</td>
                                <td style="width: 220px">
                                    <select class="form-select form-select" name="" id="" style="margin-left: auto" aria-label=".form-select example" style="font-size: 14">
                                        <option selected value="">Asiste</option>
                                        <option value=""> Falta</option>
                                        <option value=""> Falta justificada</option>
                                        <option value=""> Bono por sobre esfuerzo y reemplazo</option>
                                        <option value=""> Licencia</option>
                                        <option value=""> Vacaciones</option>
                                    </select>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <p></p>
                    
                    <button class="btn btn-primary" style="margin-left: auto; width: 100px">Enviar</button>
                </form>

            </div>
        </div>
    
    </div>
    
    <script>

        // Data Picker Initialization
        $('.datepicker').datepicker();
        
    </script>
</body>
@endsection
</html>