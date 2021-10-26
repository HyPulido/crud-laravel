@extends('layouts.app')

@section('content')
    <div class="container" style="width: 50%;">
        <h1>{{ $modo }} empleado</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre"
                value="{{ isset($empleado->nombre) ? $empleado->nombre : old('nombre') }}" id="nombre">
        </div>
        <div class="form-group">
            <label for="p-apellido">Primer apellido: </label>
            <input type="text" class="form-control" name="primer_apellido"
                value="{{ isset($empleado->primer_apellido) ? $empleado->primer_apellido : old('primer_apellido') }}" id="p-apellido">
        </div>
        <div class="form-group">
            <label for="s-apellido">Segundo apellido:</label>
            <input type="text" class="form-control" name="segundo_apellido"
                value="{{ isset($empleado->segundo_apellido) ? $empleado->segundo_apellido : old('segundo_apellido')}}" id="s-apellido">
        </div>
        <div class="form-group">
            <label for="correo">Correo electronico</label>
            <input type="email" class="form-control" name="correo"
                value="{{ isset($empleado->correo) ? $empleado->correo : old('correo') }}" id="correo">
        </div>
        <div class="form-group">
            <label for="imagen"></label><br>
            @if (isset($empleado->imagen))
                <img class="img-thumbnail img-fluid"
                    src="{{ asset('storage') . '/' . (isset($empleado->imagen) ? $empleado->imagen : '') }}" alt=""
                    width="100">
            @endif
            <input type="file" name="imagen" value="imagen" class="form-control" id="imagen">

        </div>

        <input type="submit" class="btn btn-success" value="{{ $modo }}">

        <a class="btn btn-primary" href="{{ url('empleados/') }}">Regresar</a>

    </div>
@endsection
