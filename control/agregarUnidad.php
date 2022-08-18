<?php
include("../conexion/connect_db.php");

$nomUn = $_POST['nombreUnidad'];
$domUn = $_POST['domicilioUni'];
$telUn = $_POST['telefonoUni'];
$girEm = $_POST['giroEmpresarial'];
$numTra = $_POST['numTrabajadores'];

    mysqli_query($mysqli,"INSERT INTO unidadreceptora (nombreUnidad, domicilioUni, telefonoUni, giroEmpresarial, numTrabajadores) VALUES ('$nomUn','$domUn','$telUn','$girEm','$numTra')");

    if($mysqli){
    Header("Location: ../vista/registroUnidad.php");
    }else{    
    }


?>