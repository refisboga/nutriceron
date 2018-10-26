@extends('sistema.nav_admin')
@section('contenido')
<div class="container">
	<h2>Perfil</h2>
	<p>Datos del Doctor.</p>
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>#Id</th><th>Nombre</th><th>Correo</th><th>Contraseña</th><th>Telefono</th>
			</tr>
		</thead>
		@foreach($doc as $datos)
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-info" role="button" href="#">MODIFICAR</a>
					<a class="btn btn-warning" role="button" href="#">DESACTIVAR</a>
				</td>
				<td>{{$datos->id_doc}}</td><td>{{$datos->nombre}} {{$datos->ap_pat}} {{$datos->ap_mat}}</td>
				<td>{{$datos->tel}}</td><td>{{$datos->correo}}</td><td>{{$datos->pass}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop