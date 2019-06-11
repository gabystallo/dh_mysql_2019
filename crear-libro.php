<?php

require "conexion.php";

$titulo = $_POST['titulo'];
$id_autor = intval($_POST['id_autor']);

if($id_autor == 0) {
	$id_autor = null;
}

//acá puedo hacer las validaciones necesarias antes de la query

try {
	$consulta = $base->prepare("INSERT INTO libros (titulo, id_autor) values (?, ?)");
	
	//con bind value
	// $consulta->bindValue(1, $titulo, PDO::PARAM_STR);
	// $consulta->bindValue(2, $id_autor, PDO::PARAM_INT);
	// $consulta->execute();

	//con execute cortito
	$consulta->execute([$titulo, $id_autor]);

} catch(PDOException $error) {
	
	echo("Ocurrió un error al crear el nuevo libro");
	die();
}

header('Location: libros.php');
