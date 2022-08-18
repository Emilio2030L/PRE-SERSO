<?php
include("../conexion/connect_db.php");
$idp = $_POST['idPrograma'];
$nomPro = $_POST['carrera'];

    mysqli_query($mysqli,"UPDATE programaeducativo SET carrera = '$nomPro' WHERE idPrograma = '$idp'");

    if($mysqli){
    Header("Location: ../vista/indexAdmin.php");
    }else{    
    }


?>