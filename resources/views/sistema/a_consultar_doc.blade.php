@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Listado de Doctores</h2>
	<p>Estatus de los Doctores.</p>
	
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>#Id</th><th>Nombre</th><th>Telefono</th><th>Correo</th><th>Contraseña</th>
			</tr>
		</thead>
		@foreach($doc as $datos)
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-info" role="button" href="#">Modificar</a>
					<a class="btn btn-warning" role="button" href="#">Desactivar</a>
				</td>
				<td>{{$datos->id_doc}}</td><td>{{$datos->nombre}} {{$datos->ap_pat}} {{$datos->ap_mat}}</td>
				<td>{{$datos->tel}}</td><td>{{$datos->correo}}</td><td>{{$datos->pass}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop