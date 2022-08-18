<?php
	require("../conexion/connect_db.php");
	$desc = $_POST['descripcion'];
	$l = $_POST['lug'];
	$a = $_POST['activ'];
	$imagen = '';
	if(isset($_FILES["foto"])){
		$file = $_FILES["foto"];
		$nombre = $file["name"];
		$tipo = $file["type"];
		$ruta_provisional = $file["tmp_name"];
		$size = $file["size"];
		$dimensiones = getimagesize($ruta_provisional);
		$width = $dimensiones[0];
		$height = $dimensiones[1];
		$carpeta = "../vista/imagenes/";
		if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){

			echo "error, esto no es una imagen";
		}else if ($size > 3*1024*1024) {
			echo "error, el tamaño maximo es de 3MB";
		}else{
			$src = $carpeta.$nombre;
			move_uploaded_file($ruta_provisional, $src);
			$imagen = "../vista/imagenes/".$nombre;
		}
	}
	mysqli_query($mysqli,"INSERT INTO imagenes (descripcion,lugarImg,estado,foto) VALUES ('$desc','$l','$a','$imagen')");

    if($mysqli){
    Header("Location: ../vista/agregarLogo.php");
    }else {    
    
    }
?>