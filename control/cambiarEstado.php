<?php
include("../conexion/connect_db.php");

$id = $_POST['idAsignacion'];
$es = $_POST['estado'];

    mysqli_query($mysqli,"UPDATE asignacion SET estado = '$es' WHERE idAsignacion = '$id'");

    if($mysqli){
    Header("Location: ../vista/registroAvance.php");
    }else {    
    
    }

?>