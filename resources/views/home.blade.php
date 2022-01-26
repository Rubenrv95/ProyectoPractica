@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="col" style="margin: auto">
                    <a href="/usuarios" style="">
                        <button type="button" class="btngestionar">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/48px-User_icon_2.svg.png" alt="" srcset="">
                            Usuarios
                        </button>
                    </a>
                    <a href="/usuarios" style="">
                        <button type="button" class="btngestionar">
                        <img src="/images/building_icon.png" alt="">
                            Instalaciones
                        </button>
                    </a>
                </div>
                <div class="col" style="margin: auto; margin-top: 10px">
                    <a href="/usuarios" style="">
                        <button type="button" class="btngestionar">
                            <img src="/images/check_icon.png" alt="">
                            Asistencia
                        </button>
                    </a>
                    <a href="/usuarios" style="">
                        <button type="button" class="btngestionar">
                            <img src="/images/report_icon.png" alt="">
                            Reportes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

