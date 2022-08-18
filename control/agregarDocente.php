<?php
include("../conexion/connect_db.php");

$nom = $_POST['nombreProfesor'];
$pa = $_POST['apellidoPaterno'];
$ma = $_POST['apellidoMmaterno'];
$se = $_POST['generoProfesor'];
$pue = $_POST['puestoProfesor'];
$fechNa = $_POST['fechaNacProfesor'];
$unidadR = $_POST['idUnidad'];

    mysqli_query($mysqli,"INSERT INTO profesores (nombreProfesor,apellidoPaterno,apellidoMmaterno,generoProfesor,puestoProfesor,fechaNacProfesor,idUnidad,rol) VALUES ('$nom','$pa','$ma','$se','$pue','$fechNa','$unidadR','2')");

    if($mysqli){
        echo '<script>alert("Restauracion completada");
          window.location.href = "../vista/indexAdmin.php";
        </script> ';
    }else {    
    }


?>