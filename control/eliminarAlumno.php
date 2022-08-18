<?php

require("../conexion/connect_db.php");
$cod=$_GET['id'];

    mysqli_query($mysqli,"DELETE FROM alumnos WHERE matriculaAlumno = '$cod'");

    if($mysqli){
    Header("Location: ../vista/indexDocente.php");
    }else {    
    
    }
?>