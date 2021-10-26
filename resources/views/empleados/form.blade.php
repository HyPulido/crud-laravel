
<label for="nombre">Nombre:</label>
<input type="text" name="nombre" value="{{  isset($empleado->nombre)?$empleado->nombre:"" }}" id="nombre"><br><br>
<label for="p-apellido" >Primer apellido: </label>
<input type="text" name="primer_apellido" value="{{ isset($empleado->primer_apellido)?$empleado->primer_apellido:"" }}" id="p-apellido"><br><br>
<label for="s-apellido">Segundo apellido:</label>
<input type="text" name="segundo_apellido" value="{{  isset($empleado->segundo_apellido)?$empleado->segundo_apellido:"" }}" id="s-apellido"><br><br>
<label for="correo">Correo electronico</label>
<input type="email" name="correo" value="{{  isset($empleado->correo)?$empleado->correo:"" }}" id="correo"><br><br>
<label for="imagen">Imagen: </label><br>
@if (isset($empleado->imagen))
   <img src="{{ asset('storage').'/'.(isset($empleado->imagen)?$empleado->imagen:"") }}" alt="" width="100px" height="100px">

@endif
<input type="file" name="imagen" value="imagen" id="imagen"><br><br>
<input type="submit" value="Guardar"><br><br>

<a href="{{ url('empleados/') }}">Regresar</a>
