<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Correo Electrónico</th>
            <th>Teléfono</th>
            <th>Instalación</th>
            <th>Cargo</th>
        </tr>
        
    </thead>

    <tbody>
        @foreach ($empleados as $emp)
        <tr>
            <td>{{$emp['nombre']}}</td>
            <td>{{$emp['RUT']}}</td>
            <td>{{$emp['email']}}</td>
            <td>{{$emp['telefono']}}</td>
            <td>{{$emp['instalacion']}}</td>
            <td>{{$emp['Cargo']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>