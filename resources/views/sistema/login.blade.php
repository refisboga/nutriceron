@extends('sistema.nav_login')
@section('contenido')

<body>
	<div class="container">
		<div class="card card-container">
			<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
			<!--<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
			<p id="profile-name" class="profile-name-card"></p>-->
			<div class="containerform">
				<form class="login" name="formularioc" action="{{url('registrar')}}" method="POST">
					<h1 class="login-title">Acceso NUTRICERON</h1>
					<h4 id="cli">Ingresa tus Datos</h4>
					<input name="usu" type="text" class="login-input" placeholder="usuario" autofocus required>
					<input name="pass" type="password" class="login-input" placeholder="contraseña" autofocus required>
					<div id="button">
						<button type="submit" class="btn btn-success">INICIAR SESI&Oacute;N</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
@stop
