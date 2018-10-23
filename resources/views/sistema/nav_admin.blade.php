<!DOCTYPE html>
<html lang="es">
	<head>
	  <title>Nutriceron</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar_default">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
						<span class="sr-only">MENU</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{url('/')}}" class="navbar-brand">Nutriceron</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{url('/home')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="{{url('citas')}}"><span class="glyphicon glyphicon-calendar"></span> Citas</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-cutlery"></span> Dietas</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-heart"></span> Pre-Diagn&oacute;stico</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-check"></span> Evaluaci&oacute;n</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">PERFIL <span class="glyphicon glyphicon-chevron-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{url('/consultar')}}"><span class="glyphicon glyphicon-user"></span> Cuenta</a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-off"></span> Cerrar Sesi&oacute;n</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		@yield('contenido')
	</body>
</html>