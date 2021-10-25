Esta es la lista de todos los empleados
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($empleados as $empleado)

            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->imagen }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->primer_apellido }}</td>
                <td>{{ $empleado->segundo_apellido }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>
                    <a href="{{url('/empleados/' . $empleado->id.'/edit')}}">Editar</a> |
                    <form action="{{ url('/empleados/' . $empleado->id) }}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')">

                    </form>

                </td>
            </tr>

        @endforeach
    </tbody>
</table>
