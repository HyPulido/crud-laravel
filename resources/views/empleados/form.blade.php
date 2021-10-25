
<label for="nombre">Nombre:</label>
<input type="text" name="nombre" value="{{ $empleado->nombre }}" id="nombre"><br><br>
<label for="p-apellido" >Primer apellido: </label>
<input type="text" name="primer_apellido" value="{{ $empleado->primer_apellido }}" id="p-apellido"><br><br>
<label for="s-apellido">Segundo apellido:</label>
<input type="text" name="segundo_apellido" value="{{ $empleado->segundo_apellido }}" id="s-apellido"><br><br>
<label for="correo">Correo electronico</label>
<input type="email" name="correo" value="{{ $empleado->correo }}" id="correo"><br><br>
<label for="imagen">Imagen: </label><br>

<img src="{{ '../../../storage/app/public/'.$empleado->imagen }}" alt="Imagen de usuario {{ $empleado->id }}">

<br>
<input type="file" name="imagen" value="{{ $empleado->imagen }}" id="imagen"><br><br>
<input type="submit" value="guardar"><br><br>
