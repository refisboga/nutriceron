@extends('sistema.nav_login')
@section('contenido')

<body>
	<div class="container">
		<div class="card card-container">
			<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
			<!--<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
			<p id="profile-name" class="profile-name-card"></p>-->
			<div class="containerform">
				<form class="login" name="formularioc" action="{{url('validarlogin')}}" method="POST">
					{{csrf_field()}}
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
