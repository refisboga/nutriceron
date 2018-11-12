@extends('sistema.nav_admin')

@section('contenido')
	<div class="container">
		<h3>Mensajes</h3>
		<div class="alert alert-success">
			<strong>{{$proceso}}<br></strong>{{$mensaje}}
		</div>
	</div>
@stop