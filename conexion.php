<?php

$dsn = "mysql:host=localhost;dbname=biblioteca;port=3306";
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$base = new PDO($dsn, 'root', 'mandioca', $opt); //se conecta a la base de datos y me devuelve un objeto PDO que me sirve para correr consultas en esa base de datos