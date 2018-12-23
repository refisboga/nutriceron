@section('contenido')
<h2>Reg&iacute;strate</h2>

<div class="centrar">
	<div class="container">
		<form action="{{url('registrar')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		
			@if($errors->first('nom')) 
				<i> {{$errors->first('nom')}}</i> 
				<br>
			@endif
			<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" name="nom" style="width: 25%" placeholder="Nombre (s)" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Pedro" value="{{old('nom')}}" autofocus required>
			</div>
			
			@if($errors->first('ap')) 
				<i> {{$errors->first('ap')}}</i>
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="ap" style="width: 25%" placeholder="Apellido Paterno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{old('ap')}}" required >
			</div>
			
			@if($errors->first('am')) 
				<i> {{$errors->first('am')}}</i>
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" name="am" style="width: 25%" placeholder="Apellido Materno" class="form-control" pattern="[A-Z][A-Z,a-z, ,á,é,í,ó,ú,Ñ,ñ]*" title="Ejemplo: Ramírez" value="{{old('ap')}}" required >
			</div>
			
			@if($errors->first('email')) 
				<i> {{$errors->first('email')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" name="email" style="width: 25%" placeholder="e-mail" class="form-control" pattern="^[a-zA-Z0-9.!#$%&*+/=_-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z]+)+$" title="Ejemplo: ejemplo@ejemplo.com" value="{{old('email')}}" required>
			</div>
			
			@if($errors->first('pass')) 
				<i> {{ $errors->first('pass') }} </i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" name="pass" style="width: 25%" placeholder="Contraseña" class="form-control" pattern="[a-zA-Z0-9[]{}.;:_+*!#$%&/]*" min="8" title="Mínimo 8 caracteres. Combinación de Letras, Números y Símbolos" value="{{old('pass')}}" required >
			</div>
			
			@if($errors->first('tel')) 
				<i> {{$errors->first('tel')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
				<input type="text" name="tel" style="width: 25%" placeholder="Telefono" class="form-control" pattern="[0-9]+" maxlength="10" title="Ejemplo: 7225206712" value="{{old('tel')}}" required >
			</div>
			
			@if($errors->first('img')) 
				<i> {{$errors->first('img')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="file" name="img" style="width: 35%" placeholder="Foto de Perfil" class="form-control"  title="Imagen" value="{{old('img')}}">
			</div>
			
			@if($errors->first('kg')) 
				<i> {{$errors->first('kg')}}</i> 
				<br>
			@endif
			@if($errors->first('gr')) 
				<i> {{$errors->first('gr')}}</i> 
				<br>
			@endif
			<label>Peso:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
				<select name="kg" style="width: 11%" class="form-control" value="{{old('kg')}}" required>
					<option value="" disabled selected>Kilogramos</option>
					<option disabled></option>
					<?php
						for($i=30; $i<=150;$i++){
					?>
					<option value="<?php echo $i;?>"><?php echo $i;?> kg.</option>
					<?php }?>
				</select>
				<select name="gr" style="width: 12%" class="form-control" value="{{old('gr')}}" required>
					<option value="" disabled selected>Gramos</option>
					<option disabled></option>
					<?php
						for($i=0;$i<=900;$i=$i+100){
					?>
					<option value="<?php echo $i;?>"><?php echo $i;?> gr.</option>
					<?php }?>
				</select>
			</div>
			
			@if($errors->first('talla')) 
				<i> {{$errors->first('talla')}}</i> 
				<br>
			@endif
			<label>Talla:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
				<select name="talla" style="width: 11%" class="form-control" value="{{old('talla')}}" required>
					<option value="" disabled selected>Metros</option>
					<option disabled></option>
					<?php
						for($i=0; $i<100;$i++){
							$j=1;
							$k=0;
							if($i<=9){
								$i=$k.$i;
							}
					?>
					<option value="<?php echo $j.".".$i;?>"><?php echo $j.".".$i;?> mts.</option>
						<?php }?>
				</select>
			</div>
			
			<div class="input-group">
				<label>Sexo:</label><br>
					<label><input type="radio" name="sexo" value="F" checked>Femenino</label><br>
					<label><input type="radio" name="sexo" value="M">Masculino</label>
			</div>
			
			@if($errors->first('fecha')) 
				<i> {{$errors->first('fecha')}}</i> 
				<br>
			@endif
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
				<input type="date" name="fecha" style="width: 15%" class="form-control" value="{{old('fecha')}}">
			</div>
			<br>
			
			<div>
				<button type="reset" class="btn btn-danger">CANCELAR <span class="glyphicon glyphicon-remove"></span></button>
				<button type="submit" class="btn btn-success">REGISTRARSE <span class="glyphicon glyphicon-ok"></span></button>
			</div>
		</form>
	  <br>
	</div>
</div>
@stop