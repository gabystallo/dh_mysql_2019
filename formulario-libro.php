<?php
require_once 'conexion.php';

try {
	$consulta = $base->query("SELECT * from autores order by apellido, nombre");
} catch(PDOException $error) {
	die('Falló la consulta a la base de datos');
}
$autores = $consulta->fetchAll(PDO::FETCH_ASSOC);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id==0) {
	$libro = false;
} else {

	try {
		$consulta = $base->prepare("SELECT * from libros where id = ?");
		$consulta->execute([$id]);
		$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
		$libro = $resultado[0];
	} catch(PDOException $error) {
		die('Error blablabla');
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Biblioteca - <?php echo ($libro ? 'Editar' : 'Crear') ?> Libro</title>
	<meta charset="utf-8">
	<style type="text/css">
		body { font-family: sans-serif; font-size:15px; }
		input { font-size:15px; width:400px; padding:6px; }
		select { font-size:15px; width:400px; height:40px; }
		div { margin-bottom:10px; }
		button { font-size:18px; }
	</style>
</head>
<body>
	<h1><?php echo ($libro ? 'Editar' : 'Crear nuevo') ?> libro</h1>

	<form method="post" action="<?php echo ($libro ? 'editar' : 'crear') ?>-libro.php">
		<?php if($libro) { ?>
			<input type="hidden" name="id" value="<?php echo $libro['id'] ?>">
		<?php } ?>
		<div>
			<input type="text" name="titulo" placeholder="Título" value="<?php echo ($libro ? $libro['titulo'] : '') ?>">
		</div>
		<div>
			<select name="id_autor">
				<option value="">Sin autor</option>
				<?php foreach($autores as $autor) { ?>
					<option value="<?php echo $autor['id'] ?>" <?php echo ( ($libro && $libro['id_autor']==$autor['id']) ? 'selected' : '' ) ?> ><?php echo $autor['apellido'] . ' ' . $autor['nombre'] ?></option>
				<?php } ?>
			</select>
		</div>
		
		<div>
			<button type="submit"><?php echo ($libro ? 'EDITAR' : 'CREAR') ?></button>
		</div>
	</form>
</body>
</html>