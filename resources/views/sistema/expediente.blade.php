@extends('sistema.nav_usuario')

@section('contenido')
	
	<h2>Listado del Expediente</h2
	<div class="container">
		<p>Estatus de actualizaciones.</p>
		
		<table class="table">
			<thead>
				<tr>
					<th>Acci&oacute;n</th><th>#Expediente</th><th>#Paciente</th><th>Nombre</th><th>Fecha</th><th>Hora</th><th>T. Sangre</th>
					<th>Alergias</th><th>Enfermedades</th><th>Cirugia</th><th>Tratamiento</th>
				</tr>
			</thead>
			@foreach($expe as $datos)
			<tbody>
				<tr class="info">
					<td>
						<a class="btn btn-success" role="button" href="#">DESCARGAR</a>
					</td>
					<td>{{$datos->id_exp}}</td><td>{{$datos->id_pac_fk}}</td><td>{{Session::get('sesionname')}}</td><td>{{$datos->fecha}}</td>
					<td>{{$datos->hora}}</td><td>{{$datos->tipo_sangre}}</td>
					@if($datos->alergia1=="" && $datos->alergia2=="")
						<td>-----</td>
					@else
						<td>{{$datos->alergia1}} {{$datos->alergia2}}</td>
					@endif
					@if($datos->enfermedad1=="" && $datos->enfermedad2=="")
						<td>-----</td>
					@else
						<td>{{$datos->enfermedad1}} {{$datos->enfermedad2}}</td>
					@endif
					@if($datos->cirugia=="")
						<td>-----</td>
					@else
						<td>{{$datos->cirugia}}</td>
					@endif
					@if($datos->tratamiento=="")
						<td>-----</td>
					@else
						<td>{{$datos->tratamiento}}</td>
					@endif
				</tr>      
			</tbody>
			@endforeach
		</table>
	</div>
@stop