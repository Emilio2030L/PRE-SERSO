<?php
include("../conexion/connect_db.php");

$id = $_POST['idAsignacion'];
$ac = $_POST['actividadRealizar'];
$fe = $_POST['fecha'];

    mysqli_query($mysqli,"UPDATE asignacion SET actividadRealizar = '$ac', fecha = '$fe'  WHERE idAsignacion = '$id'");

    if($mysqli){
    Header("Location: ../vista/indexDocente.php");
    }else {    
    
    }

?>