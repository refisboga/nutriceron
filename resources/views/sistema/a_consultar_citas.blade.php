@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Listado de Citas</h2>
	<p>Estatus de las Citas.</p>
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>Estatus</th><th>#Cita</th><th>Fecha</th><th>Hora</th><th>Nombre</th><th>Correo</th><th>Telefono</th>
			</tr>
		</thead>
		@foreach($citas as $datos)
		@if($datos->estatus_cita=="")
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-warning" role="button" href="#">MODIFICAR</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('cita@a_desactivar_cita',['id'=>$datos->id_cita])}}">DESACTIVAR</a>					
				</td>
				<td>Cita Activa</td>
				<td>{{$datos->id_cita}}</td><td>{{$datos->fecha}}</td><td>{{$datos->hora}}</td>
				<td>{{$datos->nombre}} {{$datos->ap_pat}} {{$datos->ap_mat}}</td><td>{{$datos->correo}}</td><td>{{$datos->telefono}}</td>
			</tr>      
		</tbody>
		@endif
		@endforeach
	</table>
</div>
@stop