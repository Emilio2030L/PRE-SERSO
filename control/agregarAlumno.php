<?php
include("../conexion/connect_db.php");

$nomAl = $_POST['nombreAlumno'];
$paAl = $_POST['apellidoPpaterno'];
$maAl = $_POST['apellidoMaterno'];
$feIn = $_POST['fechaInicio'];
$feFi = $_POST['fechaFin'];
$telAl = $_POST['telefonoAlumno'];
$gen = $_POST['genero'];
$pro = $_POST['proceso'];
$prograEdu = $_POST['idPrograma'];
$cua = $_POST['cuatrimestre'];
$gru = $_POST['grupo'];
$g = $_POST['generacion'];
$matPR = $_POST['matriculaProfesor'];

    mysqli_query($mysqli,"INSERT INTO alumnos (nombreAlumno,apellidoPpaterno,apellidoMaterno,fechaInicio,fechaFin,telefonoAlumno,genero,proceso,idPrograma,cuatrimestre,grupo,generacion,rol) VALUES ('$nomAl','$paAl','$maAl','$feIn','$feFi','$telAl','$gen','$pro','$prograEdu','$cua','$gru','$g','3')");

    if($mysqli){
    mysqli_query($mysqli," UPDATE altalumno SET matriculaProfesor = '$matPR' ORDER BY idAlta DESC LIMIT 1; ");
    Header("Location: ../vista/indexDocente.php");
    }else {    


    }


?>