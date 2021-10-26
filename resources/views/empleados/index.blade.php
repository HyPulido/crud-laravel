
@extends('layouts.app')

@section('content')
<div class="container">
@if (Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif

<br>
<a href="{{ url('empleados/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
<br>
<br>

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
                <td><img src="{{ asset('storage').'/'.$empleado->imagen }}" alt="Imagen '.{{$empleado->imagen}}" width="100" class="img-thumbnail img-fluid"></td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->primer_apellido }}</td>
                <td>{{ $empleado->segundo_apellido }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>
                    <a href="{{url('/empleados/' . $empleado->id.'/edit')}}" class="btn btn-warning">Editar</a>

                    <form action="{{ url('/empleados/' . $empleado->id) }}" method="POST" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Eliminar" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger">

                    </form>

                </td>
            </tr>

        @endforeach
    </tbody>
</table>
</div>
@endsection
