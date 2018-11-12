@extends('sistema.nav_usuario')

@section('contenido')
<h2>Evaluaci&oacute;n Diagn&oacute;stica</h2>
<p>Solo Ingresa tus datos, en los campos "Habilitados".</p>
<div class="container">
	<form action="{{url('regeva')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		
		@if($errors->first('id')) 
			<i> {{$errors->first('id')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
			<input type="text" name="id" placeholder="ID" class="form-control" value="3" value="{{old('id')}}" disabled>
		</div>
		
		@if($errors->first('cal')) 
			<i> {{$errors->first('cal')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			<input type="text" name="cal" placeholder="2018-10-23" class="form-control" value="<?php echo date("Y-m-d");?>" disabled>
		</div>
		
		@if($errors->first('hora')) 
			<i> {{$errors->first('hora')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			<input type="text" name="hora" placeholder="14:30" class="form-control" value="<?php echo date("H:i");?>" disabled>
		</div>
		
		@if($errors->first('tipo')) 
			<i> {{$errors->first('tipo')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
			<select name="tipo" class="form-control" value="{{old('tipo')}}" required>
				<option value="" disabled selected>Tipo de Sangre</option>
				<option value="A-">A-</option>
				<option value="A+">A+</option>
				<option value="B-">B-</option>
				<option value="B+">B+</option>
				<option value="AB-">AB-</option>
				<option value="AB+">AB+</option>
				<option value="O-">O-</option>
				<option value="O+">O+</option>
			</select>
		</div>
		
		@if($errors->first('ale1')) 
			<i> {{$errors->first('ale1')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="ale1" placeholder="Ingresa alguna alergia que tengas" class="form-control" value="{{old('ale1')}}">
		</div>
		
		@if($errors->first('ale2')) 
			<i> {{$errors->first('ale2')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="ale2" placeholder="Describe alguna otra de tus alergias" class="form-control" value="{{old('ale2')}}">
		</div>
		
		@if($errors->first('enf1')) 
			<i> {{$errors->first('enf1')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="enf1" placeholder="Ingresa alguna enfermedad que tengas" class="form-control" value="{{old('enf1')}}">
		</div>
		
		@if($errors->first('enf2')) 
			<i> {{$errors->first('enf2')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="enf2" placeholder="Describe alguna otra enfermedad" class="form-control" value="{{old('enf2')}}">
		</div>
		
		@if($errors->first('tc')) 
			<i> {{$errors->first('tc')}}</i> 
			<br>
		@endif
		<div class="radio">
			<label>Haz tenido Cirugias</label>
			<br>
			<label><input type="radio" name="tc" checked>NO</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="tc">SI</label>
		</div>
		
		@if($errors->first('desccir')) 
			<i> {{$errors->first('desccir')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="desccir" placeholder="Si haz tenido cirugias, describe la." class="form-control" value="{{old('desccir')}}">
		</div>
		
		@if($errors->first('tra')) 
			<i> {{$errors->first('tra')}}</i> 
			<br>
		@endif
		<div class="radio">
			<label>Te encuentras en Tratamiento</label>
			<br>
			<label><input type="radio" name="tra" checked>NO</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="tra">SI</label>
		</div>
		
		@if($errors->first('desctra')) 
			<i> {{$errors->first('desctra')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
			<input type="text" name="desctra" placeholder="Si estas en tratamiento, describe lo." class="form-control" value="{{old('desctra')}}">
		</div>
		
		<div>
			<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">ENVIAR EVALUACI&Oacute;N <span class="glyphicon glyphicon-floppy-disk"></span></button>
		</div>
	</form>
  <br>
</div>
@stop