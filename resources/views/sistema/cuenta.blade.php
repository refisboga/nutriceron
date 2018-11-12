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
					<a class="btn btn-warning" role="button" href="{{URL::action('usuario@modif',['id'=>$datos->id_pac])}}">MODIFICAR</a>
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