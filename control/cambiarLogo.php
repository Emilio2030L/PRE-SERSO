<?php
include("../conexion/connect_db.php");
$cod=$_POST['cod'];
$desc = $_POST['descripcion'];
$l = $_POST['lug'];
$a = $_POST['activ'];

    mysqli_query($mysqli,"UPDATE imagenes SET descripcion = '$desc' ,lugarImg = '$l', estado = '$a' WHERE idImg = $cod");

    if($mysqli){
    Header("Location: ../vista/agregarLogo.php");
    }else {    
    
    }


?>