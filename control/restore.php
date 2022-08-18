<?php
require("../conexion/Connet.php");
$restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
$sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
set_time_limit (60);
$con=mysqli_connect(SERVER, USER, PASS, BD);
$con->query("SET FOREIGN_KEY_CHECKS=0");
for($i = 0; $i < (count($sql)-1); $i++){
    if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
}
$con->query("SET FOREIGN_KEY_CHECKS=1");
$con->close();
if($totalErrors<=0){
	echo '<script>alert("Restauracion completada");
	window.location.href = "../vista/indexAdmin.php";
	</script> ';

}else{
	echo '<script>alert("Error al resturar")</script> ';
}
