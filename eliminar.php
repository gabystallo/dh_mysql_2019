<?php

require "conexion.php";

$id = intval($_GET['id']);

//acá puedo hacer las validaciones necesarias antes de la query

try {
	$base->query("delete from autores where id = $id");

} catch(PDOException $error) {
	
	echo("Ocurrió un error al eliminar el autor");
	die();
}

header('Location: /');