<?php
include("../conexion/connect_db.php");
$cod=$_POST['idAdmin'];
$pass = $_POST['passwordAdmin'];

    if(isset($_POST['btnReg'])){
        $passwordEncryp = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);
        mysqli_query($mysqli,"UPDATE administrador SET passwordAdmin = '$passwordEncryp' WHERE idAdmin = '$cod'");
    }

    if($mysqli){
        echo '<script>alert("Contraseña modificada");
        window.location.href = "../vista/indexAdmin.php";
        </script> ';
    }else {    
        echo '<script>alert("Error");
        window.location.href = "../vista/modificarContraAd.php";
        </script> ';
    }

?>