@extends('sistema.nav_usuario')

@section('contenido')
<h2>Agendar Cita</h2>
<p>Solo Ingresa tus datos, en los campos "Habilitados".</p>

<div class="container">
	<form action="{{url('regcita')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
			<input type="text" name="id" placeholder="ID" class="form-control" value="2" disabled>
		</div>
	
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="nom" placeholder="Nombre" class="form-control" required>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
			<input type="text" name="direc" placeholder="Dirección" class="form-control" value="Av. Quintana Roo esq. Hidalgo" disabled>
			<input type="text" name="cp" placeholder="CP" class="form-control" value="50143" disabled>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			<input type="text" name="tel" placeholder="Telefono" class="form-control" value="7225104562" disabled>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="text" name="correo" placeholder="Correo" class="form-control" value="citas@nutriceron.com" disabled>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			<input type="text" name="cal" placeholder="2018-10-23" class="form-control" required>
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			<input type="text" name="hora" placeholder="14:30" class="form-control" required>
		</div>
		
		<div>
			<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">CREAR CITA <span class="glyphicon glyphicon-floppy-disk"></span></button>
		</div>
	</form>
  <br>
</div>
@stop