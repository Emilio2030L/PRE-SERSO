<?php
include("../conexion/connect_db.php");
$cod=$_POST['idUnidad'];
$nom = $_POST['nombreUnidad'];
$do = $_POST['domicilioUni'];
$te = $_POST['telefonoUni'];
$nu = $_POST['numTrabajadores'];
 
    mysqli_query($mysqli,"UPDATE unidadreceptora SET nombreUnidad = '$nom', domicilioUni = '$do', telefonoUni = '$te', numTrabajadores = '$nu'  WHERE idUnidad = '$cod'");

    if($mysqli){
    Header("Location: ../vista/indexDocente.php");
    }else {    
    
    }


?>