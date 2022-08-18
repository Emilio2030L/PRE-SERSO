<?php
include("../conexion/connect_db.php");
$cod=$_POST['matriculaProfesor'];
$pass = $_POST['passwordProfesor'];

    if(isset($_POST['btnReg'])){
        $passwordEncryp = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);
        mysqli_query($mysqli,"UPDATE profesores SET passwordProfesor = '$passwordEncryp' WHERE matriculaProfesor = '$cod'");
    }

    if($mysqli){
        echo '<script>alert("Contraseña modificada");
        window.location.href = "../vista/indexDocente.php";
        </script> ';
    }else {    
        echo '<script>alert("Error");
        window.location.href = "../vista/modificarContraDo.php";
        </script> ';
    }

?>