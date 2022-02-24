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
                        <h1 style="margin:auto">Instalaciones por Dotación</h1>
                        <canvas id="myChart" width="300" height="100"></canvas>
                    </div>


                    <div class="card">
                        <h1 style="margin:auto">Tabla de Instalaciones</h1>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

    $(document).ready(function() {
        
        var cData = JSON.parse('<?php echo $data ?>');
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cData.label,
                datasets: [{
                    label: 'Dotación de Instalaciones',
                    data: cData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(182, 20, 51, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
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