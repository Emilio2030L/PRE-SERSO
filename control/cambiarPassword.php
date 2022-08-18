<?php
include("../conexion/connect_db.php");
$cod=$_POST['matriculaAlumno'];
$pass = $_POST['passwordAlumno'];

    if(isset($_POST['btnReg'])){
        $passwordEncryp = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);
        mysqli_query($mysqli,"UPDATE alumnos SET passwordAlumno = '$passwordEncryp' WHERE matriculaAlumno = '$cod'");
    }

    if($mysqli){
        echo '<script>alert("Contraseña modificada");
        window.location.href = "../vista/indexAlumno.php";
        </script> ';
    }else {    
        echo '<script>alert("Error");
        window.location.href = "../vista/modificarContra.php";
        </script> ';
    }

?>