<?php

require("../conexion/connect_db.php");
$cod=$_GET['id'];

$resultAll = mysqli_query($mysqli,"SELECT * FROM imagenes WHERE idImg ='$cod'");
$sql2 = mysqli_fetch_array($resultAll);
echo $sql2['foto'];

    If (unlink($sql2['foto'])) {
        $sql="DELETE FROM imagenes WHERE idImg='$cod'";
        $query=mysqli_query($mysqli,$sql);
        // file was successfully deleted
        echo '<script>alert("REGISTRO ELIMINADO")</script> ';
        echo "<script>location.href='../vista/agregarLogo.php'</script>";
    } else {
      // there was a problem deleting the file
    }
?>