<?php

require("../conexion/connect_db.php");
$cod=$_GET['id'];

    mysqli_query($mysqli,"DELETE FROM profesores WHERE matriculaProfesor = '$cod'");

    if($mysqli){
    Header("Location: ../vista/indexAdmin.php");
    }else {    
    
    }
?>