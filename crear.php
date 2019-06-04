<?php

require "conexion.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = intval($_POST['edad']);
$dni = intval($_POST['dni']);

//acá puedo hacer las validaciones necesarias antes de la query

try {
	$base->query("insert into autores (nombre, apellido, edad, dni) values ('$nombre', '$apellido', $edad, '$dni')"); //corre la consulta y me devuelve un resultado dentro de un objeto hijo pdo

} catch(PDOException $error) {
	
	echo("Ocurrió un error al crear el nuevo autor");
	die();
}

header('Location: /');
