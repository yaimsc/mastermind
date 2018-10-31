<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>juego</title>
</head>
<body>
	<h1>Bienvenido/a al Mastermind!</h1>
	@foreach(Session::get('clave1') as $valor)
		<img src="img/bola{{ $valor }}.png"> 
	@endforeach
	<br>
	<h2>Introduce el código</h2>

	<form method="post" action="comprobar" action="juego" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>

		@if(isset($_POST['comprobar']))
			@foreach(Session::get('historial') as $valor)
				@for($i = 0; $i < Session::get('longitud'); $i++)
					<img src="img/bola{{$valor[0]}}.png">
				@endfor
				<p>Aciertos: {{ $acierto}} </p>
				<p>Candidato: {{ $candidato }} </p>
			@endforeach	
		@endif
		<br>
		
		@for ($i = 0; $i < Session::get('longitud'); $i++)
		<select name="{{$i}}">
			<option value="0">Azul Oscuro</option>
			<option value="1">Dorado</option>
			<option value="2">Verde</option>
			<option value="3">Rojo</option>
			<option value="4">Azul Clarito</option>
			<option value="5">Morado</option>
			<option value="6">Amarillo Fosforito</option>
			<option value="7">Gris</option>
		</select>
		@endfor

		<br>
		<br>
		<input type="submit" name="comprobar" value="comprobar">

	</form>
	<h2>Jugador: <h2><h2>{{ Session::get('nombre')}}</h2>
	<hr>
	<h4>Intentos: {{ Session::get('intentosP')}} /  {{ Session::get('intentos')}}</h4>

</body>
</html>