@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Men&uacute;s Registrados</h2>
	<p>Datos del men&uacute;.</p>
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>Estatus</th><th>#Id</th><th>Tipo</th><th>Nombre del Men&uacute;</th><th>Descripci&oacute;n</th>
				</tr>
		</thead>
		@foreach($menu as $datos)
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-success" role="button" href="{{URL::action('a_menu@a_restaurar_menu',['id'=>$datos->id_menu])}}">Restaurar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('a_menu@a_eliminar_menu',['id'=>$datos->id_menu])}}">Eliminar</a>
				</td>
				<td>Desactivo</td>
				<td>{{$datos->id_menu}}</td><td>{{$datos->tipo_comida}}<td>{{$datos->descr}}</td><td>{{$datos->menu}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop