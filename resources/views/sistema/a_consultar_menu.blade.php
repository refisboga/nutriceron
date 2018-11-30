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
		@if($datos->deleted_at=="")
		<tbody>
			<tr class="info">
				<td>
					<a class="btn btn-warning" role="button" href="{{URL::action('a_menu@a_v_modificar_menu',['id'=>$datos->id_menu])}}">Modificar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('a_menu@a_desactivar_menu',['id'=>$datos->id_menu])}}">Desactivar</a>
				</td>
				<td>Activo</td>
				<td>{{$datos->id_menu}}</td><td>{{$datos->tipo_comida}}<td>{{$datos->descr}}</td><td>{{$datos->menu}}</td>
			</tr>      
		</tbody>
		@endif
		@endforeach
	</table>
</div>
@stop