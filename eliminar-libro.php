<?php

require "conexion.php";

$id = intval($_GET['id']);

//acá puedo hacer las validaciones necesarias antes de la query

try {
	$consulta = $base->prepare("DELETE from libros where id = ?");
	//con bind value
	// $consulta->bindValue(1, $id, PDO::PARAM_INT);
	// $consulta->execute();
	
	$consulta->execute([$id]);

} catch(PDOException $error) {
	
	echo("Ocurrió un error al eliminar el libro");
	die();
}

header('Location: libros.php');