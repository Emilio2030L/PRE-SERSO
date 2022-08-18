<?php
include("../conexion/connect_db.php");

$p1 = $_POST['pre1'];
$p2 = $_POST['pre2'];
$p3 = $_POST['pre3'];
$p4 = $_POST['pre4'];
$p5 = $_POST['pre5'];
$p6 = $_POST['pre6'];
$p7 = $_POST['pre7'];
$p8 = $_POST['pre8'];
$p9 = $_POST['pre9'];
$uni = $_POST['idUnidad'];
$ma = $_POST['matriculaAlumno'];

    mysqli_query($mysqli,"INSERT INTO evaluacionunidad (pre1,pre2,pre3,pre4,pre5,pre6,pre7,pre8,pre9,idUnidad,matriculaAlumno) VALUES ('$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$uni','$ma')");

    if($mysqli){
    Header("Location: ../vista/evaluacionEncargado.php");
    }else{    
    }


?>