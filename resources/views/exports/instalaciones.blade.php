<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <td>Nombre</td>
            <td>Dirección</td>
            <td>Dotación</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($instalaciones as $i)
        <tr>
            <td>{{$i['id']}}</td>
            <td>{{$i['nombre_insta']}}</td>
            <td>{{$i['Direccion']}}</td>
            <td>{{$i['Dotacion']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>