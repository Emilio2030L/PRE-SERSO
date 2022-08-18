<?php
include("../conexion/connect_db.php");

$nomPro = $_POST['carrera'];

    mysqli_query($mysqli,"INSERT INTO programaeducativo (carrera) VALUES ('$nomPro')");

    if($mysqli){
    Header("Location: ../vista/indexAdmin.php");
    }else{    
    }


?>