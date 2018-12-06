@extends('sistema.nav_usuario')

@section('contenido')

<h2>Listado de Citas</h2>
	<div class="container">
		<p>Estatus de actualizaciones.</p>
			<table class="table">
			<thead>
				<tr>
					<th>Acci&oacute;n</th><th>Estatus</th><th>#Id Cita</th><th>Nombre</th><th>Fecha</th><th>Hora</th>
				</tr>
			</thead>
			@foreach($citas as $datos)
			<tbody>
				<tr class="info">
					<td>
						<a class="btn btn-warning" role="button" href="{{URL::action('cita@v_modificar_citap',['id'=>$datos->id_cita])}}">Modificar</a>
						@if($datos->deleted_at=="")
							<a class="btn btn-danger" role="button" href="{{URL::action('cita@desactivar_cita',['id'=>$datos->id_cita])}}">Desactivar</a>
						@else
							<a class="btn btn-success" role="button" href="{{URL::action('cita@restaurar_cita',['id'=>$datos->id_cita])}}">Restaurar</a>
						@endif
					</td>
					@if($datos->deleted_at =="")
						<td>Cita Activa</td>
					@else
						<td>Cita Desactivada</td>
					@endif
					<td>{{$datos->id_cita}}</td><td>{{Session::get('sesionname')}} {{Session::get('sesionlastname')}}</td><td>{{$datos->fecha}}</td><td>{{$datos->hora}}</td>
					<td></td><td></td><td></td>
				</tr>      
			</tbody>
			@endforeach
		</table>
	</div>
@stop