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
  $var4 = $rowData["fechaInicio"];
  $var5 = $rowData["fechaFin"];
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
<h1> Jiutepec, Morelos a 18 de Agostro del 2022 </h1>
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
de JUNIO a AGOSTO DEBERÁN SER 6 MESES
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