@extends('sistema.nav_usuario')

@section('contenido')
	
	<h2>Listado del Expediente</h2
	<div class="container">
		<p>Estatus de actualizaciones.</p>
		
		<table class="table">
			<thead>
				<tr>
					<th>Acci&oacute;n</th><th>#Id Paciente</th><th>Nombre</th><th>Fecha</th><th>Hora</th>
					<th>T. Sangre</th><th>Estatus</th>
				</tr>
			</thead>
			@foreach($expe as $datos)
			<tbody>
				<tr class="info">
					<td>
						<a class="btn btn-success" role="button" href="#">DESCARGAR</a>
					</td>
					<td>{{$datos->pac_fk}}</td><td>Pedro Gonzalez Perez</td><td>{{$datos->fecha}}</td>
					<td>{{$datos->hora}}</td><td>{{$datos->tipo_sangre}}</td><td></td>
				</tr>      
			</tbody>
			@endforeach
		</table>
	</div>
@stop