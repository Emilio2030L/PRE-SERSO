<?php
include("../conexion/connect_db.php");
$idp = $_GET['id'];

    mysqli_query($mysqli,"DELETE FROM programaeducativo WHERE idPrograma = '$idp'");

    if($mysqli){
    Header("Location: ../vista/indexAdmin.php");
    }else{    
    }


?>