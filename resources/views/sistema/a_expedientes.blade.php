@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Listado de Expedientes</h2>
	<p>Estatus de los Expedientes.</p>
	
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>#Id</th><th>Paciente</th><th>Fecha</th><th>Hora</th><th>Sangre</th><th>Alergias</th>
				<th>Enfermedad</th><th>Cirugia</th><th>Tratamiento</th><th></th>
			</tr>
		</thead>
		@foreach($expe as $datos)
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-info" role="button" href="#">Modificar</a>
					<a class="btn btn-warning" role="button" href="#">Desactivar</a>
				</td>
				<td>{{$datos->id_exp}}</td><td>Joel</td><td>{{$datos->fecha}}</td><td>{{$datos->hora}}</td>
				<td>{{$datos->tipo_sangre}}</td><td>{{$datos->alergia1}} | {{$datos->alergia2}}</td>
				<td>{{$datos->enfermedad1}} | {{$datos->enfermedad2}}</td><td>{{$datos->tipo_cirugia}}</td>
				<td>{{$datos->desc_tratamiento}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop