@extends('sistema.nav_login')

@section('contenido')
<body>
	<div class="container" align="center">
		<div class="alert alert-danger">
			<strong>{{$proceso}}<br></strong>{{$mensaje}}
		</div>
	</div>
	<div class="container">
		<div class="card card-container">
			<div class="containerform">
				<form class="login" name="formularioc" action="{{url('validarlogin')}}" method="POST">
					{!! csrf_field() !!}
					<h1 class="login-title">Iniciar Sesi&oacute;n</h1>
					<h4 id="cli">Ingresa tus Datos</h4>
					<input name="correo" type="text" class="login-input" placeholder="correo" autofocus required>
					<input name="pass" type="password" class="login-input" placeholder="contraseña" required>
					<div id="button">
						<button type="submit" class="btn btn-success">INGRESAR</button>
					</div>
				</form>
				@if(Session::has('error'))
					<div>{{ Session::get('error') }}</div>
				@endif
			</div>
		</div>
	</div>
</body>
@stop