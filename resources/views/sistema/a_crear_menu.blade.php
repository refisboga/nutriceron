@extends('sistema.nav_admin')

@section('contenido')
<h2>Crear Men&uacute;</h2>
<p>Aqu&iacute; puedes crear diversos men&uacute;s.</p>
<div class="container">
	<form action="{{url('regmenu')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
			<select name="tipo" class="form-control" required>
				<option value="" disabled selected>Tipo de Comida</option>
				<option value="Entrada">Entrada</option>
				<option value="Sopa">Sopa</option>
				<option value="Guisado">Guisado</option>
				<option value="Postre">Postre</option>
				<option value="Colacion">Colacion</option>
			</select>
		</div>		
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="desc" placeholder="Nombre del Menú" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="descripcion">Descripci&oacute;n:</label>
			<textarea class="form-control" rows="12" maxlength="300" id="comment" placeholder="Redacta el menú aquí..." name="menu"></textarea>
			<p>300 caracteres como m&aacute;ximo.</p>
		</div>
		
		<div>
			<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">GUARDAR MENU <span class="glyphicon glyphicon-floppy-disk"></span></button>
		</div>
	</form>
  <br>
</div>
@stop