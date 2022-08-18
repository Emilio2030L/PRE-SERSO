<?php
include("../conexion/connect_db.php");
$cod=$_POST['matriculaProfesor'];
$nomP = $_POST['nombreProfesor'];
$apeP = $_POST['apellidoPaterno'];
$apeM = $_POST['apellidoMmaterno'];
$ge = $_POST['generoProfesor'];
$pu = $_POST['puestoProfesor'];
$fe = $_POST['fechaNacProfesor'];
$id = $_POST['idUnidad'];

    mysqli_query($mysqli,"UPDATE profesores SET nombreProfesor = '$nomP', apellidoPaterno = '$apeP', apellidoMmaterno = '$apeM', generoProfesor = '$ge', puestoProfesor = '$pu', fechaNacProfesor = '$fe', idUnidad = '$id' WHERE matriculaProfesor = '$cod'");

    if($mysqli){
    Header("Location: ../vista/indexAdmin.php");
    }else {    
    
    }


?>