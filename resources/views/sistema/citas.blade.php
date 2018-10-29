@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="contenido">
	<h2>Listado de Citas</h2>
	<p>Estatus de las Citas.</p>
	
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>#Id Paciente</th><th>Nombre</th><th>Fecha</th><th>Hora</th><th>Telefono</th>
			</tr>
		</thead>
		@foreach($citas as $datos)
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-info" role="button" href="#">Modificar</a>
					<a class="btn btn-warning" role="button" href="#">Desactivar</a>
				</td>
				<td>{{$datos->id_cita}}</td><td>Pedro</td><td>{{$datos->fecha}}</td><td>{{$datos->hora}}</td>
				<td>{{$datos->tel}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop