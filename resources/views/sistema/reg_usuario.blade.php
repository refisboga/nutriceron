@extends('sistema.main')

@section('contenido')
<legend>Reg&iacute;strate</legend>

<div class="container">
	<form action="{{url('registrar')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
	
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="nom" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" autofocus required>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="ap" placeholder="Apellido Paterno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" required >
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="am" placeholder="Apellido Materno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" required >
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="email" placeholder="e-mail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&*+/=_-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z]+)+$" title="Ejemplo: ejemplo@ejemplo.com" required>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="pass" placeholder="Contraseña" class="form-control" pattern="[a-zA-Z0-9[]{}.;:_+*!#$%&/]*" min="8" title="Mínimo 8 caracteres. Combinación de Letras, Números y Símbolos" required >
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			<input type="text" name="tel" placeholder="Telefono" class="form-control" pattern="[0-9]+" title="Ejemplo: 7225206712" required >
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
			<input type="text" name="peso" placeholder="Peso" class="form-control" pattern="[0-9]+[.][0-9]+" title="Ejemplo: 56.400" required >
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
			<input type="text" name="talla" placeholder="Talla" class="form-control" pattern="[0-9]+[.][0-9]+" title="Ejemplo: 1.67" required >
		</div>
		
		<div class="input-group">
			<label>Sexo</label>
				<input type="radio" name="sexo" value="F">F
				<input type="radio" name="sexo" value="M">M
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
			<input type="date" name="fecha">
		</div>
		<br>
		
		<div>
			<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">REGISTRARSE <span class="glyphicon glyphicon-ok"></span></button>
		</div>
	</form>
  <br>
</div>
@stop