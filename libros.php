<?php
require_once 'conexion.php';

try {
	//esta consulta me va a traer todos los libros (tengan o no autor) con el nombre y apellido de su autor (si lo tiene)
	$resultado = $base->query("SELECT l.*, a.nombre as nombre_autor, a.apellido as apellido_autor from libros l left join autores a on l.id_autor = a.id order by l.id desc"); //corre la consulta y me devuelve un resultado dentro de un objeto hijo pdo


} catch(PDOException $error) {
	$mensaje = $error->getMessage(); //string descriptiva del error
	$codigo = $error->getCode(); //codigo tipificado del error
	
	echo("Ocurrió un error con una consulta en la base de datos");
	die(); //lo mismo que exit()
}


$libros = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema biblioteca - Libros</title>
	<meta charset="utf-8">
	<style type="text/css">
		body { font-family: sans-serif; font-size:15px; }
		article { margin:0 10px; margin-bottom:20px; display:inline-block; vertical-align:top; width:20%; padding:10px; background-color:#eee; }
		div { margin-bottom:5px; }
	</style>
</head>
<body>
	<h1>Libros</h1>
	<div>
		<a href="formulario-libro.php">CREAR NUEVO LIBRO</a>
	</div>
	<?php foreach($libros as $libro) { ?>
		<article>
			<div>
				<label>Título:</label> <strong><?php echo $libro['titulo'] ?></strong>
			</div>
			<div>
				<label>Autor:</label> <strong><?php echo $libro['nombre_autor'] . ' ' . $libro['apellido_autor'] ?></strong>
			</div>
			<div>
				<a href="formulario-libro.php?id=<?php echo $libro['id'] ?>" style="color:orange;">EDITAR</a>
			</div>
			<div>
				<a href="eliminar-libro.php?id=<?php echo $libro['id'] ?>" style="color:red;">ELIMINAR</a>
			</div>
		</article>
	<?php } ?>
</body>
</html>

