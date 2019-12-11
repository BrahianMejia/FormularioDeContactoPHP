<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

	<div class="wrap">

		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
			
			<input type="text" name="nombre" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre; ?>">

			<input type="text" name="correo" placeholder="Correo" value="<?php if(!$enviado && isset($correo) && $correo_valido) echo $correo; ?>">

			<textarea name="mensaje" class="form-control" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje)) echo $mensaje; ?></textarea>

				<?php if($errores): ?>
					<div class="alert error">
						<?php echo $errores; ?>
					</div>
				<?php elseif($enviado): ?>
					<div class="alert success">
						<p>Correo enviado correctamente.</p>
					</div>
				<?php endif;?>

			<input type="submit" name="enviar" value="Enviar correo" class="btn">
		</form>

	</div>

</body>
</html>