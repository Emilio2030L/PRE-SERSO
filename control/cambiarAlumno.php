<?php
include("../conexion/connect_db.php");
$cod=$_POST['matriculaAlumno'];
$nomAl = $_POST['nombreAlumno'];
$estL = $_POST['estadoliberacion'];

    mysqli_query($mysqli,"UPDATE alumnos SET nombreAlumno = '$nomAl' WHERE matriculaAlumno = '$cod'");

    if($mysqli){
    mysqli_query($mysqli,"UPDATE altalumno SET estadoliberacion = '$estL' WHERE matriculaAlumno = '$cod'");
    Header("Location: ../vista/indexDocente.php");
    }else {    
    
    }


?>