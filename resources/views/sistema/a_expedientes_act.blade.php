@extends('sistema.nav_admin')
@section('contenido')
<div class="container" id="cont">
	<h2>Listado de Expedientes</h2>
	<p>Estatus de los Expedientes.</p>
	<table class="table">
		<thead>
			<tr>
				<th>Acci&oacute;n</th><th>Estatus</th><th>#Expe</th><th>Paciente</th><th>Fecha</th><th>Sangre</th><th>Alergias</th>
				<th>Enfermedad</th><th>Cirugia</th><th>Tratamiento</th><th></th>
			</tr>
		</thead>
		@foreach($expe as $datos)
		@if($datos->deleted_at=="")
		<tbody>
			<tr class="info">
				<td>
					@if($datos->deleted_at=="")
					<a class="btn btn-warning" role="button" href="{{URL::action('a_expedientes@a_v_expe',['id'=>$datos->id_exp])}}">Modificar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('a_expedientes@desactivar_expe',['id'=>$datos->id_exp])}}">Desactivar</a>
					@else
					<a class="btn btn-success" role="button" href="{{URL::action('a_expedientes@restaurar_expe',['id'=>$datos->id_exp])}}">Restaurar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('a_expedientes@eliminar_expe',['id'=>$datos->id_exp])}}">Eliminar</a>
					@endif
				</td>
				@if($datos->deleted_at=="")
					<td>Activo</td>
				@else
					<td>Desactivo</td>
				@endif
				<td>{{$datos->id_exp}}</td><td>{{$datos->nombre}} {{$datos->ap_pat}} {{$datos->ap_mat}}</td><td>{{$datos->fecha}}</td>
				<td>{{$datos->tipo_sangre}}</td><td>{{$datos->alergia1}} | {{$datos->alergia2}}</td>
				<td>{{$datos->enfermedad1}} | {{$datos->enfermedad2}}</td><td>{{$datos->tipo_cirugia}}</td>
				<td>{{$datos->desc_tratamiento}}</td>
			</tr>      
		</tbody>
		@endif
		@endforeach
	</table>
</div>
@stop