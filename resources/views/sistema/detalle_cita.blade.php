@extends('sistema.nav_usuario')

@section('contenido')

<legend>Listado de Citas</legend>
	<div class="container">
		<p>Estatus de actualizaciones.</p>
		
		<table class="table">
			<thead>
				<tr>
					<th>Acci&oacute;n</th><th>#Id Paciente</th><th>Nombre</th><th>Fecha</th><th>Hora</th><th>Estatus</th>
				</tr>
			</thead>
			@foreach($citas as $datos)
			<tbody>
				<tr class="info">
					<td>
						<a class="btn btn-success" role="button" href="#">DESCARGAR</a>
						<a class="btn btn-warning" role="button" href="#">MODIFICAR</a>
						<a class="btn btn-danger" role="button" href="#">ELIMINAR</a>
					</td>
					<td>{{$datos->id_cita}}</td><td>Pedro Gonzalez Perez</td><td>{{$datos->fecha}}</td><td>{{$datos->hora}}</td><td></td>
				</tr>      
			</tbody>
			@endforeach
		</table>
	</div>
@stop