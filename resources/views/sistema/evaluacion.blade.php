@extends('sistema.nav_usuario')

@section('contenido')
<legend>Evaluaci&oacute;n Diagn&oacute;stica</legend>

<div class="container">
	<form action="{{url('registrar')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
			<input type="text" name="id" placeholder="ID" class="form-control">
		</div>
		
		<div>
			<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
			<button type="submit" class="btn btn-success">ENVIAR EVALUACI&Oacute;N <span class="glyphicon glyphicon-floppy-disk"></span></button>
		</div>
	</form>
  <br>
</div>
@stop