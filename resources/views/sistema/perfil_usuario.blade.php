@extends('sistema.nav_usuario')
@section('contenido')
<div class="container">
	<h2>Perfil del Usuario</h2>
	<p>Datos del Paciente.</p>
	<table class="table">
		<thead>
			<tr>
				<th>Accion</th><th>#Id</th><th>Nombre</th><th>Correo</th><th>Contraseña</th><th>Telefono</th>
				<th>Peso</th><th>Talla</th><th>Fecha Nacimiento</th><th>Sexo</th>
			</tr>
		</thead>
		@foreach($usuario as $datos)
		<tbody>
			<tr class="info">
				<td>
				@if($datos->deleted_at=="")
					<a class="btn btn-warning" role="button" href="{{URL::action('usuario@modif',['id'=>$datos->id_pac])}}">Modificar</a>
					<a class="btn btn-danger" role="button" href="{{URL::action('usuario@u_desactivar_pac',['id'=>$datos->id_pac])}}">Desactivar</a>
				@else
					<a class="btn btn-success" role="button" href="{{URL::action('usuario@u_restaurar_pac',['id'=>$datos->id_pac])}}">Restaurar</a>
				@endif
				</td>
				<td>{{$datos->id_pac}}</td><td>{{$datos->nombre}} {{$datos->ap_pat}} {{$datos->ap_mat}}</td><td>{{$datos->correo}}</td>
				<td>{{$datos->pass}}</td><td>{{$datos->telefono}}</td><td>{{$datos->peso}}</td><td>{{$datos->talla}}</td>
				<td>{{$datos->fec_nac}}</td><td>{{$datos->sexo}}</td>
			</tr>      
		</tbody>
		@endforeach
	</table>
</div>
@stop