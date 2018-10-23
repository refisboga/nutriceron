<!DOCTYPE html>
<html lang="es">
	<head>
	  <title>Nutriceron</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="{{asset('css/style_user.css')}}"/>
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

				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{url('registrate')}}"><span class="glyphicon glyphicon-user"></span> REGISTRATE</a></li>
					<li><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in"></span> INGRESAR</a></li>
				</ul>
			</div>
		</nav>
		@yield('contenido')
	</body>
</html>