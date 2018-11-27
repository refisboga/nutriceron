@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Listado de Doctores</h2>
	<p>Estatus de los Doctores.</p>
	
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>Estatus</th><th>#Doctor</th><th>Nombre</th><th>Ced. Prof.</th><th>Telefono</th><th>Correo</th>
			</tr>
		</thead>
		@foreach($doc as $datos)
		<tbody>
			<tr class="info">
				<td>
					@if($datos->deleted_at=="")
					<a class="btn btn-warning" role="button" href="{{URL::action('a_doctores@v_modificar_doc',['id'=>$datos->id_doc])}}">Modificar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('a_doctores@desactivar_doctor',['id'=>$datos->id_doc])}}">Desactivar</a>
					@else
					<a class="btn btn-success" role="button" href="{{URL::action('a_doctores@restaurar_doctor',['id'=>$datos->id_doc])}}">Restaurar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('a_doctores@eliminar_doctor',['id'=>$datos->id_doc])}}">Eliminar</a>
					@endif
				</td>
				@if($datos->deleted_at=="")
				<td>Activo</td>
				@else
				<td>Desactivado</td>
				@endif
				<td>{{$datos->id_doc}}</td><td>{{$datos->nombre}} {{$datos->ap_pat}} {{$datos->ap_mat}}</td>
				<td>{{$datos->cedula}}</td><td>{{$datos->tel}}</td><td>{{$datos->correo}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop