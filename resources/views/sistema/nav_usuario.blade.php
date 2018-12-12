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
    [endif]-->

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
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                </li>-->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="{{asset('archivos/'.Session::get('sesionimg'))}}" width="30" height="30" alt="Profile"> {{Session::get('sesionname')}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/cuenta')}}"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <!--<li><a href="{{url('/herramientas')}}"><i class="fa fa-gear fa-fw"></i> Herramientas</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="{{url('/cerrarsesion')}}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n</a>
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
                            <a href="{{url('/home')}}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Citas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/cita')}}">Agendar Cita</a>
                                </li>
                                <li>
                                    <a href="{{url('detalle_cita')}}">Detalles de la Cita</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                             <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Evaluaci&oacute;n<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/evaluacion')}}">Realizar Pre-Evaluaci&oacute;n</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Expediente<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/expediente')}}">Historial de Pre-Evaluaci&oacute;n</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Dietas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/cons_menu')}}">Ver Men&uacute;s Disponibles</a>
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
            </div>
        @yield('contenido')
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
    <script src="{{asset('nav/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>
