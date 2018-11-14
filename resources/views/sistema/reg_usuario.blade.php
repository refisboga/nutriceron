@extends('sistema.main')

@section('contenido')
<h2>Reg&iacute;strate</h2>

<div class="container">
	<form action="{{url('registrar')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
	
		@if($errors->first('nom')) 
			<i> {{$errors->first('nom')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="nom" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" value="{{old('nom')}}" autofocus required>
		</div>
		
		@if($errors->first('ap')) 
			<i> {{$errors->first('ap')}}</i>
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="ap" placeholder="Apellido Paterno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{old('ap')}}" required >
		</div>
		
		@if($errors->first('am')) 
			<i> {{$errors->first('am')}}</i>
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="am" placeholder="Apellido Materno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{old('ap')}}" required >
		</div>
		
		@if($errors->first('email')) 
			<i> {{$errors->first('email')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="email" placeholder="e-mail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&*+/=_-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z]+)+$" title="Ejemplo: ejemplo@ejemplo.com" value="{{old('email')}}" required>
		</div>
		
		@if($errors->first('pass')) 
			<i> {{ $errors->first('pass') }} </i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="pass" placeholder="Contraseña" class="form-control" pattern="[a-zA-Z0-9[]{}.;:_+*!#$%&/]*" min="8" title="Mínimo 8 caracteres. Combinación de Letras, Números y Símbolos" value="{{old('pass')}}" required >
		</div>
		
		@if($errors->first('tel')) 
			<i> {{$errors->first('tel')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			<input type="text" name="tel" placeholder="Telefono" class="form-control" pattern="[0-9]+" maxlength="10" title="Ejemplo: 7225206712" value="{{old('tel')}}" required >
		</div>
		
		@if($errors->first('kg')) 
			<i> {{$errors->first('kg')}}</i> 
			<br>
		@endif
		@if($errors->first('gr')) 
			<i> {{$errors->first('gr')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
			<select name="kg" class="form-control" value="{{old('kg')}}" required>
				<option value="" disabled selected>Kilogramos</option>
				<option disabled></option>
				<?php
					for($i=30; $i<=150;$i++){
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?> kg.</option>
				<?php }?>
			</select>
			<select name="gr" class="form-control" value="{{old('gr')}}" required>
				<option value="" disabled selected>Gramos</option>
				<option disabled></option>
				<?php
					for($i=0;$i<=900;$i=$i+100){
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?> gr.</option>
				<?php }?>
			</select>
		</div>
		
		@if($errors->first('metros')) 
			<i> {{$errors->first('metros')}}</i> 
			<br>
		@endif
		@if($errors->first('cm')) 
			<i> {{$errors->first('cm')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
			<select name="metros" class="form-control" value="{{old('metros')}}" required>
				<option value="" disabled selected>Metros</option>
				<option disabled></option>
				<option value="0">0 mts.</option>
				<option value="1">1 mts.</option>
				<option value="2">2 mts.</option>
			</select>
			<select name="cm" class="form-control" value="{{old('cm')}}" required>
				<option value="" disabled selected>Cent&iacute;metros</option>
				<option disabled></option>
				<?php
					for($i=99; $i>=0;$i--){
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?> cm.</option>
				<?php }?>
			</select>
		</div>
		
		<div class="input-group">
			<label>Sexo</label>
				<input type="radio" name="sexo" value="F" checked>F
				<input type="radio" name="sexo" value="M">M
		</div>
		
		@if($errors->first('fecha')) 
			<i> {{$errors->first('fecha')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
			<input type="date" name="fecha" value="{{old('fecha')}}">
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