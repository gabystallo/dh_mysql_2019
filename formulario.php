<!DOCTYPE html>
<html>
<head>
	<title>Biblioteca - Crear Autor</title>
	<meta charset="utf-8">
	<style type="text/css">
		body { font-family: sans-serif; font-size:15px; }
		input { font-size:15px; width:400px; padding:6px; }
		div { margin-bottom:10px; }
		button { font-size:18px; }
	</style>
</head>
<body>
	<h1>Crear nuevo autor</h1>

	<form method="post" action="crear.php">
		<div>
			<input type="text" name="nombre" placeholder="Nombre">
		</div>
		<div>
			<input type="text" name="apellido" placeholder="Apellido">
		</div>
		<div>
			<input type="number" name="edad" placeholder="Edad">
		</div>
		<div>
			<input type="text" name="dni" placeholder="DNI">
		</div>
		<div>
			<button type="submit">CREAR</button>
		</div>
	</form>
</body>
</html>