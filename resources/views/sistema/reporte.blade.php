<html>
<body>
<h1>Reporte de Maestros</h1>
<br>
<table border= 1>
<tr>
	<td>Clave</td><td>Foto</td><td>Nombre</td>
	<td>Edad</td><td>Sexo</td><td>Operaciones</td>
</tr>
@foreach($maestros as $ma)
<tr>
	<td>{{$ma->idm}}</td><td>
	<img src = "{{asset('archivos/'.$ma->archivo)}}"
        height =50 width=50></td>
	<td>{{$ma->nombre}}</td>
	<td>{{$ma->edad}}</td><td>{{$ma->sexo}}</td>
	<td>
	<a href="{{URL::action('curso@eliminam',['idm'=>$ma->idm])}}"> 
	Eliminar	
	</a> 
	Modificar</td>
</tr>
@endforeach

</table>
</body>
</html>