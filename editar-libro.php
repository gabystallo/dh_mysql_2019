<?php

require "conexion.php";

$id = intval($_POST['id']);
$titulo = $_POST['titulo'];
$id_autor = intval($_POST['id_autor']);

if($id_autor == 0) {
	$id_autor = null;
}

//acá puedo hacer las validaciones necesarias antes de la query

try {
	$consulta = $base->prepare("UPDATE libros set titulo=?, id_autor=? WHERE id=?");
	
	//con execute cortito
	$consulta->execute([$titulo, $id_autor, $id]);

} catch(PDOException $error) {
	
	echo("Ocurrió un error al editar el libro");
	die();
}

header('Location: libros.php');
