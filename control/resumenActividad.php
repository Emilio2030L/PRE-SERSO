<?php
include("../conexion/connect_db.php");
$re = $_POST['resumen'];
$ap = $_POST['apoyo'];
$me = $_POST['medio'];
$id = $_POST['idAlta'];

    mysqli_query($mysqli,"INSERT INTO registroactividades (resumen,apoyo,medio,idAlta) VALUES ('$re','$ap','$me','$id')");

    if($mysqli){
    Header("Location: ../vista/indexAlumno.php");
    }else {    
    }


?>