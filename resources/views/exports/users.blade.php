<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <th>Nombre</th>
        <td>Correo Electrónico</td>
        <td>Tipo</td>
    </thead>

    <tbody>
        @foreach ($usuarios as $user)
        <tr>
            <td> {{$user['nombre']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['tipo']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>