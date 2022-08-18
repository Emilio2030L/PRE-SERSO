<?php
include("../conexion/connect_db.php");

$de = $_POST['actividadRealizar'];
$fe = $_POST['fecha'];
$id = $_POST['idAlta'];

    mysqli_query($mysqli,"INSERT INTO asignacion (actividadRealizar,fecha,estado,idAlta) VALUES ('$de','$fe',0,'$id')");

    if($mysqli){
    Header("Location: ../vista/asignarActividad.php");
    }else {    


    }


?>