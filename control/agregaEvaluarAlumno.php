<?php
include("../conexion/connect_db.php");

$e1 = $_POST['ev1'];
$e2 = $_POST['ev2'];
$e3 = $_POST['ev3'];
$e4 = $_POST['ev4'];
$e5 = $_POST['ev5'];
$e6 = $_POST['ev6'];
$e7 = $_POST['ev7'];
$e8 = $_POST['ev8'];
$e9 = $_POST['ev9'];
$e10 = $_POST['ev10'];
$e11 = $_POST['ev11'];
$e12 = $_POST['ev12'];
$e13 = $_POST['ev13'];
$e14 = $_POST['ev14'];
$e15 = $_POST['ev15'];
$e16 = $_POST['ev16'];
$e17 = $_POST['ev17'];
$e18 = $_POST['ev18'];
$e19 = $_POST['ev19'];
$id = $_POST['idAlta'];

    mysqli_query($mysqli,"INSERT INTO evaluacionalumno (ev1,ev2,ev3,ev4,ev5,ev6,ev7,ev8,ev9,ev10,ev11,ev12,ev13,ev14,ev15,ev16,ev17,ev18,ev19,idAlta) VALUES ('$e1','$e2','$e3','$e4','$e5','$e6','$e7','$e8','$e9','$e10','$e11','$e12','$e13','$e14','$e15','$e16','$e17','$e18','$e19','$id')");

    if($mysqli){
    Header("Location: ../vista/evaluacionAlumno.php");
    }else{    
    }


?>