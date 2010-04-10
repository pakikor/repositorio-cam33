<?php
	require_once 'BD.php';
	BD::espeficarDatos("localhost", "root", "8520", "pi");
	require_once 'ENAlbum.php';
	require_once 'ENFoto.php';
	require_once 'ENUsuario.php';
	require_once 'ENPais.php';
	require_once 'resize.php';

	function accesoValido()
	{
		if ($_SESSION["conectado"] != "si")
		{
			header("location: index.php");
			exit();
		}
	}

	function filtrarCadena($cadena)
	{
		if ($cadena != NULL)
		{
			if (is_string($cadena) || is_numeric($cadena))
			{
				$cadena = str_replace("'", "", $cadena);
				$cadena = str_replace("\\", "", $cadena);
				$cadena = str_replace("\"", "", $cadena);
				$cadena = str_replace("=", "", $cadena);
				$cadena = str_replace(">", "", $cadena);
				$cadena = str_replace("<", "", $cadena);
				$cadena = str_replace("\/", "", $cadena);
				$cadena = str_replace("/", "", $cadena);
				$cadena = str_replace("%", "", $cadena);
				$cadena = str_replace(";", ":", $cadena);
				$cadena = str_replace("|", "", $cadena);
				$cadena = str_replace("&", "", $cadena);
				return $cadena;
			}
		}
		return "";
	}

	function rellenar($cadena,$caracter,$digitos)
	{
		while (strlen($cadena)<$digitos)
		{
			$cadena = "$caracter$cadena";
		}
		return $cadena;
	}

	function borrarFichero($rutaFichero)
	{
		if ($rutaFichero != NULL)
		{
			if (file_exists($rutaFichero))
				return @unlink($rutaFichero);
			else
				return false;
		}
		return false;
	}
?>