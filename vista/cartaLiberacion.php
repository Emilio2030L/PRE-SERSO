<?php
/*require 'dompdf/autoload.inc.php';*/
require("../conexion/connect_db.php");
  
  session_start();
  if (@!$_SESSION['nombreAlumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }
  $nom = $_SESSION['nombreAlumno'];
  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  $rowData2 = mysqli_fetch_array($resultAll3);

  $resultAll = mysqli_query($mysqli," SELECT * FROM altalumno INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno inner join profesores ON 
profesores.matriculaProfesor = altalumno.matriculaProfesor INNER JOIN programaeducativo ON programaeducativo.idPrograma = alumnos.idPrograma WHERE nombreAlumno = '$nom'; ");  
  $rowData = mysqli_fetch_array($resultAll);
  /*<?php echo $rowData["nombreAlumno"]; ?>*/
  $h = " ";
  $var1 = $rowData["nombreAlumno"] . $h . $rowData["apellidoPpaterno"] . $h . $rowData["apellidoMaterno"];
  $var2 = $rowData["carrera"];
  $var3 = $rowData["nombreProfesor"] . $h . $rowData["apellidoPaterno"] . $h . $rowData["apellidoMmaterno"];
  $var4 = strtotime($rowData["fechaInicio"]);
  $var5 = strtotime($rowData["fechaFin"]);
  $mes = date("m", $var4);
  $mes1 = date("m", $var5);
  $DiaSem = date('d', time()); 
  $Mess = date('m', time());
  $an = date('y', time());

  $var1 = strtoupper($var1);
  $var2 = strtoupper($var2);
  $var3 = strtoupper($var3);
  ob_start();
?>

<html>
	<head>
		<meta charset = "utf-8">
		<style>
			h1 {
			  color: ;
			  font-weight: normal;
			  font-size: 18px;
			  font-family: Franklin Gothic Medium;
			}
		</style>
	</head>
<body>
<div ALIGN = center>
	<img src="<?php echo $rowData2['foto']; ?>" alt="logo" width="170">
</div>
<div ALIGN=right>
<h1> <?php echo "Jiutepec, Morelos a $DiaSem de ";?>  
<?php 

if ($Mess == "01"){
  echo "Enero";
}
if ($Mess == "02"){
  echo "Febrero";
}
if ($Mess == "03"){
  echo "Marzo";
}
if ($Mess == "04"){
  echo "Abril";
}
if ($Mess == "05"){
  echo "Mayo";
}
if ($Mess == "06"){
  echo "Junio";
}
if ($Mess == "07"){
  echo "Julio";
}
if ($Mess == "08"){
  echo "Agosto";
}
if ($Mess == "09"){
  echo "Septiembre";
}
if ($Mess == "10"){
  echo "Octubre";
}
if ($Mess == "11"){
  echo "Noviembre";
}
if ($Mess == "12"){
  echo "Diciembre";
}

?>
<?php echo " de $an."; ?> </h1>
<h1> Asunto: Carta de liberación del servicio social </h1>
</div>
<div ALIGN=letf>
<h1> Lic. Naylete Priscilia Segura Díaz Directora de Vinculación </h1>
<h1> Universidad Politécnica del Estado de Morelos </h1>
<h1> Presente: </h1>
</div>
<div>
<p style = "font-size: 20px; text-align: justify ">
Por éste medio permito informarle que el alumno(a) <?php echo $var1 ?>, con número de matrícula <?php echo $rowData["matriculaAlumno"]; ?> inscrito(a) en
<?php echo $rowData["cuatrimestre"]; ?> cuatrimestre, de la carrera <?php echo $var2 ?> de la Universidad Politécnica del Estado de Morelos
UPEMOR ha concluido satisfactoriamente su Servicio Social reglamentario,
desarrollando tareas diversas, cubriendo un total de 480 hrs. en el periodo
de 
<?php 
if ($mes == "01"){
  echo "Enero";
}
if ($mes == "02"){
  echo "Febrero";
}
if ($mes == "03"){
  echo "Marzo";
}
if ($mes == "04"){
  echo "Abril";
}
if ($mes == "05"){
  echo "Mayo";
}
if ($mes == "06"){
  echo "Junio";
}
if ($mes == "07"){
  echo "Julio";
}
if ($mes == "08"){
  echo "Agosto";
}
if ($mes == "09"){
  echo "Septiembre";
}
if ($mes == "10"){
  echo "Octubre";
}
if ($mes == "11"){
  echo "Noviembre";
}
if ($mes == "12"){
  echo "Diciembre";
}
?>
 a 
<?php 
if ($mes1 == "01"){
  echo "Enero";
}
if ($mes1 == "02"){
  echo "Febrero";
}
if ($mes1 == "03"){
  echo "Marzo";
}
if ($mes1 == "04"){
  echo "Abril";
}
if ($mes1 == "05"){
  echo "Mayo";
}
if ($mes1 == "06"){
  echo "Junio";
}
if ($mes1 == "07"){
  echo "Julio";
}
if ($mes1 == "08"){
  echo "Agosto";
}
if ($mes1 == "09"){
  echo "Septiembre";
}
if ($mes1 == "10"){
  echo "Octubre";
}
if ($mes1 == "11"){
  echo "Noviembre";
}
if ($mes1 == "12"){
  echo "Diciembre";
}
?> 
DEBERÁN SER 6 MESES
COMPLETOS.
</p>
<p style = "font-size: 20px; text-align: justify ">
El alumno(a) estuvo a cargo de <?php echo $var3 ?> quien fue la persona autorizada para la firma de los
formatos adicionales.
</p>
<p style = "font-size: 20px; text-align: justify ">
Sin más por el momento quedo de usted.
</p>
<p style = "font-size: 20px; text-align: center ">
Atentamente
</p>
<br>
<br>
<br>
<br>
<hr style = "width: 45%;">
<p style = "font-size: 20px; text-align: center ">
<?php echo $var3 ?>
</p>
<p style = "font-size: 20px; text-align: center "><?php echo $rowData["puestoProfesor"]; ?></p>
</div>
</body>
</html>


<?php 
$html = ob_get_clean();
//echo $html;

require '../vista/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$dompdf->load_html($html);
$dompdf->setPaper('letter');
//$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("cartaAceptacion.pdf", array('Attachment'=>'0'));?>