@extends('sistema.nav_usuario')

@section('contenido')
<h2>Modificar Paciente</h2>

<div class="centrar">
	<div class="container">
		<form action="{{url('modificaru')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		
			@if($errors->first('id')) 
				<i> {{$errors->first('id')}}</i> 
				<br>
			@endif
			<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" name="id" value="{{$datos->id_pac}}" style="width: 10%" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" readonly>
			</div>
		
			@if($errors->first('nom')) 
				<i> {{$errors->first('nom')}}</i> 
				<br>
			@endif
			<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" name="nom" value="{{$datos->nombre}}" style="width: 25%" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" autofocus required>
			</div>
			
			@if($errors->first('ap')) 
				<i> {{$errors->first('ap')}}</i>
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="ap" value="{{$datos->ap_pat}}" style="width: 25%" placeholder="Apellido Paterno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" required >
			</div>
			
			@if($errors->first('am')) 
				<i> {{$errors->first('am')}}</i>
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="am" value="{{$datos->ap_mat}}" style="width: 25%" placeholder="Apellido Materno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" required >
			</div>
			
			@if($errors->first('email')) 
				<i> {{$errors->first('email')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" name="email" value="{{$datos->correo}}" style="width: 25%" placeholder="e-mail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&*+/=_-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z]+)+$" title="Ejemplo: ejemplo@ejemplo.com" required>
			</div>
			
			@if($errors->first('pass')) 
				<i> {{ $errors->first('pass') }} </i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="pass" value="{{$datos->pass}}" style="width: 25%" placeholder="Contraseña" class="form-control" pattern="[a-zA-Z0-9[]{}.;:_+*!#$%&/]*" min="8" title="Mínimo 8 caracteres. Combinación de Letras, Números y Símbolos" required >
			</div>
			
			@if($errors->first('tel')) 
				<i> {{$errors->first('tel')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input type="text" name="tel" value="{{$datos->telefono}}" style="width: 25%" placeholder="Telefono" class="form-control" pattern="[0-9]+" maxlength="10" title="Ejemplo: 7225206712" required >
			</div>
			
			<br>
			<img src = "{{asset('archivos/'.$datos->imagen)}}" height =150 width=150>
			@if($errors->first('img')) 
				<i> {{$errors->first('img')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="file" name="img" style="width: 40%" placeholder="Foto de Perfil" class="form-control"  title="Imagen" value="{{old('img')}}" required >
			</div>
			
			<div class="input-group">
				<label>Sexo:</label><br>
					@if($datos->sexo=='F')
					<label><input type="radio" name="sexo" value="F" checked>Femenino</label><br>
					<label><input type="radio" name="sexo" value="M">Masculino</label>
					@else
					<label><input type="radio" name="sexo" value="F">Femenino</label><br>
					<label><input type="radio" name="sexo" value="M" checked>Masculino</label>
					@endif
			</div>
			
			@if($errors->first('fecha')) 
				<i> {{$errors->first('fecha')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
				<input type="date" name="fecha" value="{{$datos->fec_nac}}" style="width: 15%" class="form-control">
			</div>
			<br>
			
			<div>
				<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
				<button type="submit" class="btn btn-success">REGISTRARSE <span class="glyphicon glyphicon-ok"></span></button>
			</div>
		</form>
	  <br>
	</div>
</div>
@stop