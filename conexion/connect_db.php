<?php //Conexión  a la BD
		$mysqli = new MySQLi("localhost", "root","", "serviciosocial");
		$mysqli->set_charset("utf8");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else
?>