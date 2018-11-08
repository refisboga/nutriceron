@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Men&uacute;s Registrados</h2>
	<p>Datos del men&uacute;.</p>
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>#Id</th><th>Tipo</th><th>Nombre del Men&uacute;</th><th>Descripci&oacute;n</th>
				</tr>
		</thead>
		@foreach($menu as $datos)
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-info" role="button" href="#">MODIFICAR</a>
					<a class="btn btn-warning" role="button" href="#">DESACTIVAR</a>
				</td>
				<td>{{$datos->id_menu}}</td><td>{{$datos->tipo_comida}}<td>{{$datos->descr}}</td><td>{{$datos->menu}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop