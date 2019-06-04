<?php
require_once 'conexion.php';

try {
	$resultado = $base->query("SELECT * from autores"); //corre la consulta y me devuelve un resultado dentro de un objeto hijo pdo

	//equivalente a la línea de arriba pero usando statements
	// $resultado = $base->prepare("SELECT * from autores");
	// $resultado->execute();

} catch(PDOException $error) {
	$mensaje = $error->getMessage(); //string descriptiva del error
	$codigo = $error->getCode(); //codigo tipificado del error
	
	echo("Ocurrió un error con una consulta en la base de datos");
	die(); //lo mismo que exit()
}


$autores = $resultado->fetchAll(PDO::FETCH_ASSOC); //me convierte el "resultado pdo" en un array de arrays asociativos de php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema biblioteca - Autores</title>
	<meta charset="utf-8">
	<style type="text/css">
		body { font-family: sans-serif; font-size:15px; }
		article { margin:0 10px; margin-bottom:20px; display:inline-block; vertical-align:top; width:20%; padding:10px; background-color:#eee; }
		div { margin-bottom:5px; }
	</style>
</head>
<body>
	<h1>Autores</h1>
	<div>
		<a href="formulario.php">CREAR NUEVO AUTOR</a>
	</div>
	<?php foreach($autores as $autor) { ?>
		<article>
			<div>
				<label>Nombre:</label> <strong><?php echo $autor['nombre'] ?></strong>
			</div>
			<div>
				<label>Apellido:</label> <strong><?php echo $autor['apellido'] ?></strong>
			</div>
			<div>
				<label>Edad:</label> <strong><?php echo $autor['edad'] ?></strong>
			</div>
			<div>
				<a href="eliminar.php?id=<?php echo $autor['id'] ?>" style="color:red;">ELIMINAR</a>
			</div>
		</article>
	<?php } ?>
</body>
</html>

