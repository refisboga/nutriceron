@extends('sistema.nav_admin')

@section('contenido')
<h2>Reg&iacute;strar nuevo Doctor</h2>

<div class="container">
	<form action="{{url('/reg_doc')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		
		@if($errors->first('nom')) 
			<i> {{$errors->first('nom')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="nom" style="width: 25%" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" value="{{old('nom')}}" autofocus required>
		</div>
		
		@if($errors->first('ap')) 
			<i> {{$errors->first('ap')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="ap" style="width: 25%" placeholder="Apellido Paterno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{old('ap')}}" required >
		</div>
		
		@if($errors->first('am')) 
			<i> {{$errors->first('am')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="am" style="width: 25%" placeholder="Apellido Materno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{old('am')}}" required >
		</div>
		
		@if($errors->first('email')) 
			<i> {{$errors->first('email')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="email" style="width: 25%" placeholder="e-mail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&*+/=_-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z]+)+$" title="Ejemplo: ejemplo@ejemplo.com" value="{{old('email')}}" required>
		</div>
		
		@if($errors->first('pass')) 
			<i> {{$errors->first('pass')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="pass" style="width: 25%" placeholder="Contraseña" class="form-control" pattern="[a-zA-Z0-9[]{}.;:_+*!#$%&/]*" min="8" title="Mínimo 8 caracteres. Combinación de Letras, Números y Símbolos" value="{{old('pass')}}" required >
		</div>
		
		@if($errors->first('tel')) 
			<i> {{$errors->first('tel')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			<input type="text" name="tel" style="width: 25%" placeholder="Telefono" class="form-control" pattern="[0-9]+" maxlength="10" title="Ejemplo: 7225206712" value="{{old('tel')}}" required >
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