<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario</title>
</head>
<body>
	<h1>Bienvenido/a al Mastermind!</h1>
	<form method="post" action="juego">
		<label>Jugador:</label><br>
		<input type="text" name="nombre">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>

		<br>
		<label>Logitud de la clave:</label><br>
		<input type="radio" name="longitud" value="4" checked><label>4</label>
		<input type="radio" name="longitud" value="5"><label>5</label>
		<br>
		<label>Número de colores posibles:</label><br>
		<input type="radio" name="numcolors" value="4"><label>4</label>
		<input type="radio" name="numcolors" value="5"><label>5</label>
		<input type="radio" name="numcolors" value="6" checked><label>6</label>
		<input type="radio" name="numcolors" value="7"><label>7</label>
		<input type="radio" name="numcolors" value="8"><label>8</label>
		<br>
		<label>Permitir repetidos:</label><br>
		<input type="radio" name="repetir" value="Si" checked><label>Si</label>
		<input type="radio" name="repetir" value="No" disabled><label>No</label>
		<br>
		<label>Número de intentos:</label><br>
		<select name="intentos">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
		</select>
		<br>
		<input type="submit" name="enviar" value="enviar">
	</form>
</body>
</html>