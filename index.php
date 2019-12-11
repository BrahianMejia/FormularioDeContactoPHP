<?php 

	$errores = '';
	$enviado = false;
	$correo_valido = false;

	if(isset($_POST['enviar']))
	{
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$mensaje = $_POST['mensaje'];

		if(!empty($nombre))
		{
			$nombre = trim($nombre);
			$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
		}
		else
		{
			$errores .= "Por favor escriba un nombre. <br>";
		}

		if(!empty($correo))
		{
			$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

			$correo_valido = filter_var($correo, FILTER_VALIDATE_EMAIL);
			if (!$correo_valido) 
			{
				$errores .= "Por favor ingrese un correo valido. <br>";
			}
		}
		else
		{
			$errores .= "Por favor ingrese un correo. <br>";
		}

		if(!empty($mensaje))
		{
			$mensaje = trim($mensaje);
			$mensaje = htmlspecialchars($mensaje);
			$mensaje = stripcslashes($mensaje);
		}
		else
		{
			$errores .= "Por favor escriba un mensaje.";
		}

		if(!$errores)
		{
			$enviar_a = "brayantqm123@gmail.com";
			$asunto = "Correo desde mi prueba.";

			$mensaje_listo = "De: $nombre \n";
			$mensaje_listo .= "Correo: $correo \n";
			$mensaje_listo .= "Mensaje: $mensaje";

			mail($enviar_a, $asunto, $mensaje_listo);

			$enviado = true;
		}
	}

	include('logica.php');
?>