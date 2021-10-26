Esta es la lista de todos los empleados

<a href="{{ url('empleados/create') }}">Registrar nuevo empleado</a>

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
                <td><img src="{{ asset('storage').'/'.$empleado->imagen }}" alt="Imagen '.{{$empleado->imagen}}" width="100 "></td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->primer_apellido }}</td>
                <td>{{ $empleado->segundo_apellido }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>
                    <a href="{{url('/empleados/' . $empleado->id.'/edit')}}">Editar</a> |
                    <form action="{{ url('/empleados/' . $empleado->id) }}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Eliminar" onclick="return confirm('¿Quieres borrar?')">

                    </form>

                </td>
            </tr>

        @endforeach
    </tbody>
</table>
