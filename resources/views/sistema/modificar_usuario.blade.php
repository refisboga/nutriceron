@extends('sistema.nav_usuario')

@section('contenido')
<div class="container">
	<form action="{{url('modificaru')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		@foreach($datos as $dat)
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
			<input type="text" name="id" placeholder="ID" class="form-control" pattern="[0-9]+" value="{{$dat->id_pac}}" readonly>
		</div>
		
		@if($errors->first('nom')) 
			<i> {{$errors->first('nom')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="nom" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" value="{{$dat->nombre}}" autofocus required>
		</div>
		
		@if($errors->first('ap')) 
			<i> {{$errors->first('ap')}}</i>
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="ap" placeholder="Apellido Paterno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{$dat->ap_pat}}" required >
		</div>
		
		@if($errors->first('am')) 
			<i> {{$errors->first('am')}}</i>
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="am" placeholder="Apellido Materno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{$dat->ap_mat}}" required >
		</div>
		
		@if($errors->first('email')) 
			<i> {{$errors->first('email')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="email" placeholder="e-mail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&*+/=_-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z]+)+$" title="Ejemplo: ejemplo@ejemplo.com" value="{{$dat->correo}}" required>
		</div>
		
		@if($errors->first('pass')) 
			<i> {{ $errors->first('pass') }} </i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="pass" placeholder="Contraseña" class="form-control" pattern="[a-zA-Z0-9[]{}.;:_+*!#$%&/]*" min="8" title="Mínimo 8 caracteres. Combinación de Letras, Números y Símbolos" value="{{$dat->pass}}" required >
		</div>
		
		@if($errors->first('tel')) 
			<i> {{$errors->first('tel')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			<input type="text" name="tel" placeholder="Telefono" class="form-control" pattern="[0-9]+" minlength="7" maxlength="10" title="Ejemplo: 7225206712" value="{{$dat->telefono}}" required >
		</div>
		
		@if($errors->first('peso')) 
			<i> {{$errors->first('peso')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
			<input type="text" name="peso" placeholder="Peso" class="form-control" pattern="[0-9]+[.][0-9]+" title="Ejemplo: 56.400" value="{{$dat->peso}}" required >
		</div>
		
		@if($errors->first('talla')) 
			<i> {{$errors->first('talla')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
			<input type="text" name="talla" placeholder="Talla" class="form-control" pattern="[0-9]+[.][0-9]+" title="Ejemplo: 1.67" value="{{$dat->talla}}" required >
		</div>
		
		@if($dat->sexo=='F')
		<div class="input-group">
			<label>Sexo</label>
				<input type="radio" name="sexo" value="F" checked>F
				<input type="radio" name="sexo" value="M">M
		</div>
		@else
		<div class="input-group">
			<label>Sexo</label>
				<input type="radio" name="sexo" value="F">F
				<input type="radio" name="sexo" value="M" checked>M
		</div>
		@endif
		
		@if($errors->first('fecha')) 
			<i> {{$errors->first('fecha')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
			<input type="date" name="fecha" value="{{$dat->fec_nac}}">
		</div>
		<br>
		@endforeach
		<div>
			<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">GUARDAR CAMBIOS <span class="glyphicon glyphicon-ok"></span></button>
		</div>
	</form>
  <br>
</div>
@stop