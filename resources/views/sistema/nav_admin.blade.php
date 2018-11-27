<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nutriceron</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('nav/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('nav/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('nav/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('nav/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('nav/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	
	<!-- MI ESTILO-->
	<link href="{{asset('css/style_mio.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Nutriceron</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{Session::get('sesionname')}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
							<a href="{{url('/cuentadoc')}}"><i class="fa fa-user-md fa-fw"></i> Mi Perfil</a>
                        </li>
                        <li class="divider"></li>
						<li>
							<a href="{{url('/registrardoc')}}"><i class="fa fa-stethoscope fa-fw"></i> Crear Cuenta Doctor</a>
							<a href="{{url('/consultardoc')}}"><i class="fa fa-search fa-fw"></i> Consultar Doctores</a>
                        </li>
                        <li class="divider"></li>
                        <li>
							<a href="{{url('/cerrarsesion')}}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>-->
                        <li>
                            <a href="{{url('/admin')}}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Agenda de Citas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/citas')}}"><i class="fa fa-search fa-fw"></i> Consultar Citas</a>
                                </li>
								<li>
                                    <a href="{{url('/citashist')}}"><i class="fa fa-folder-open-o fa-fw"></i> Consultar Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i> Expedientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/expedientes')}}"><i class="fa fa-search fa-fw"></i> Consultar Expedientes</a>
                                </li>
								<li>
                                    <a href="{{url('/expedienteshisto')}}"><i class="fa fa-folder-open-o fa-fw"></i> Consultar Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Pacientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/pacientes')}}"><i class="fa fa-search fa-fw"></i> Consultar Pacientes</a>
                                </li>
								<li>
                                    <a href="{{url('/pacientesdesac')}}"><i class="fa fa-folder-open-o fa-fw"></i> Consultar Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-spoon fa-fw"></i> Dieta<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/crearmenu')}}"><i class="fa fa-edit fa-fw"></i>Crear Men&uacute;</a>
                                </li>
								<li>
                                    <a href="{{url('/consmenu')}}"><i class="fa fa-search fa-fw"></i> Consultar Men&uacute;</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
			@yield('contenido')
            </div>
        </div>
        <!-- /#page-wrapper -->
		
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('nav/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('nav/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('nav/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('nav/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('nav/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('nav/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="nav/dist/js/sb-admin-2.js"></script>

</body>

</html>
