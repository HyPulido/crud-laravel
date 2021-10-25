<form action="{{'/empleado/'.$empleado->id}}">
@csrf
    {{ method_field('PATCH')}}

    @include('/empleados.form')


</form>

