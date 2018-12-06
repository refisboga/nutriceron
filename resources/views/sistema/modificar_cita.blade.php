@extends('sistema.nav_usuario')

@section('contenido')
<h2>Modificar Cita</h2>
<p>Solo Ingresa tus datos, en los campos "Habilitados".</p>

<div class="container">
	<form action="{{url('/modificarcitap')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		
		@if($errors->first('id')) 
			<i> {{$errors->first('id')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
			<input type="text" name="id" style="width: 10%" placeholder="ID" class="form-control" value="{{$datos->id_cita}}" readonly>
		</div>
		
		@if($errors->first('idp')) 
			<i> {{$errors->first('idp')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
			<input type="text" name="idp" style="width: 10%" placeholder="ID" class="form-control" value="{{$datos->id_pac_fk}}" readonly>
		</div>
		
		@if($errors->first('direc')) 
			<i> {{$errors->first('direc')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
			<input type="text" name="direc" style="width: 25%" placeholder="Dirección" class="form-control" value="Av. Quintana Roo esq. Hidalgo" readonly>
		</div>
		
		@if($errors->first('cp')) 
			<i> {{$errors->first('cp')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
			<input type="text" name="cp" style="width: 10%" placeholder="CP" class="form-control" value="50143" readonly>
		</div>
		
		@if($errors->first('tel')) 
			<i> {{$errors->first('tel')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			<input type="text" name="tel" style="width: 25%" placeholder="Telefono" class="form-control" value="7225104562" readonly>
		</div>
		
		@if($errors->first('correo')) 
			<i> {{$errors->first('correo')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="correo" style="width: 25%" placeholder="Correo" class="form-control" value="citas@nutriceron.com" readonly>
		</div>
		
		@if($errors->first('fecha')) 
			<i> {{$errors->first('fecha')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
			<input type="date" name="fecha" style="width: 25%" class="form-control" value="{{$datos->fecha}}" required>
		</div>
		
		@if($errors->first('hora')) 
			<i> {{$errors->first('hora')}}</i> 
			<br>
		@endif
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			<input type="text" name="hora" style="width: 25%" placeholder="14:30" pattern="[0-9]+[:][0-9]+[:][0-9]+" class="form-control" value="{{$datos->hora}}" required>
		</div>
		<br>
		
		<div>
			<button type="reset" class="btn btn-danger">Cancelar <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
		</div>
	</form>
  <br>
</div>
@stop