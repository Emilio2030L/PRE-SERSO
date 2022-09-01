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
  $ma = $_SESSION['matriculaAlumno'];
  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  $rowData2 = mysqli_fetch_array($resultAll3);

  $resultAll = mysqli_query($mysqli,"SELECT * FROM registroactividades INNER JOIN altalumno ON altalumno.idAlta = registroactividades.idAlta 
INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno 
INNER JOIN profesores ON profesores.matriculaProfesor = altalumno.matriculaProfesor 
INNER JOIN programaeducativo ON programaeducativo.idPrograma = alumnos.idPrograma
INNER JOIN unidadreceptora ON unidadreceptora.idUnidad = profesores.idUnidad WHERE alumnos.matriculaAlumno = '$ma' ");  
  $rowData = mysqli_fetch_array($resultAll);

  $h = " ";
  $var1 = $rowData["nombreAlumno"] . $h . $rowData["apellidoPpaterno"] . $h . $rowData["apellidoMaterno"];
  $var2 = $rowData["carrera"];
  $var3 = $rowData["nombreProfesor"] . $h . $rowData["apellidoPaterno"] . $h . $rowData["apellidoMmaterno"];
  $var4 = strtotime($rowData["fechaInicio"]);
  $var5 = strtotime($rowData["fechaFin"]);
  $mes = date("m", $var4);
  $mes1 = date("m", $var5);

  //$var1 = strtoupper($var1);
  //$var2 = strtoupper($var2);
  //$var3 = strtoupper($var3);


  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  $rowData2 = mysqli_fetch_array($resultAll3);

  ob_start();
?>
<!doctype html>
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
			table,tr,td,th{
				border: 1px solid black;
				border-collapse: collapse; 
				font-size: 14px;
			}
			table{
				width: 100%
			}
		</style>
	</head>
<body>
	<table align = center class="default">

  <tr>
    <td align="center" rowspan="3"><img src="<?php echo $rowData2['foto']; ?>" alt="logo" width="120"></center></td>
    <td rowspan="2" colspan="2" style = "text-align: center ">REGISTRO DE ACTIVIDADES DEL SERVICIO SOCIAL</td>
    <td style = "text-align: center ">10/21/2016</td>
  </tr>
  <tr>
    <td style = "text-align: center ">VERSIÓN: 01</td>
  </tr>
  <tr>
    <td colspan="2" style = "text-align: center ">VSS-R1-01</td>
    <td style = "text-align: center ">PÁGINA 1 DE 1</td>
  </tr>
  <tr>
  	<td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">INFORMACIÓN DEL ALUMNO/A</td>
  </tr>
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Nombre del alumno:</td>
  	<td colspan="3"><?php echo $var1 ?></td>
  </tr>
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Carrera:</td>
  	<td ><?php echo $var2; ?></td>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Cuatrimestre:</td>
  	<td ><?php echo $rowData["cuatrimestre"]; ?></td>
  </tr>
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Matricula:</td>
  	<td ><?php echo $rowData["matriculaAlumno"]; ?></td>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Generación:</td>
  	<td ><?php echo $rowData['generacion']; ?></td>
  </tr>  
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Periodo servicio social:</td>
  	<td colspan="3"><?php 
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
 -
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
?> </td>	
  </tr>    
  <tr>
  	<td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">INFORMACIÓN DE LA UNIDAD REPECTORA</td>
  </tr>
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Nombre de la organización:</td>
  	<td colspan="3"><?php echo $rowData["nombreUnidad"]; ?></td>
  </tr>
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Dirección de la organización:</td>
  	<td colspan="3"><?php echo $rowData["domicilioUni"]; ?></td>
  </tr>
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Nombre del Responsable:</td>
  	<td><?php echo $var3; ?></td>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Puesto:</td>
  	<td><?php echo $rowData["puestoProfesor"]; ?></td>
  </tr>  
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Correo electrónico:</td>
  	<td><?php echo $rowData["correProfesor"]; ?></td>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Teléfono:</td>
  	<td><?php echo $rowData["telefonoUni"]; ?></td>
  </tr>  
  <tr>
  	<td style = "text-align: center; background-color: #CAC7C6; ">Giro empresarial:</td>
  	<td colspan="3"><?php echo $rowData["giroEmpresarial"]; ?></td>
  </tr>
  <tr>
  	<td  style = "text-align: center; background-color: #CAC7C6; ">Medio por el cual conseguiste tu lugar:</td>
  	<td colspan="3"><?php echo $rowData["medio"]; ?></td>
  </tr> 
  <tr>
  	<td  style = "text-align: center; background-color: #CAC7C6; ">Apoyo económico:</td>
  	<td colspan="3"><?php echo $rowData["apoyo"]; ?></td>
  </tr> 
  <tr>
  	<td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">RESUMEN DE ACTIVIDADES</td>
  </tr>
  <tr>
  	<td colspan="4" rowspan="10" style="text-align: justify"><?php echo $rowData["resumen"]; ?></td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  	<td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">FIRMAS DE AUTORIZACIÓN</td>
  </tr>
  <tr>
  	<td colspan="4" rowspan="10">
  	<br>
  	<br>
  	<br>
	<hr style = "width: 25%;">
	<p style = "font-size: 15px; text-align: center ">
	Nombre y firma responsable
	</p>
	<br>
  	<br>
  	<br>
	<hr style = "width: 25%; margin: 10;">
	<p style = "font-size: 15px; text-align: left; margin: 10; ">
	Dirección de vinculación
	</p>
	<hr style="width: 25%; text-align: right; margin-right: 10px;">
	<p style = "font-size: 15px; text-align: right; margin: 10px; ">
	<?php echo $var3; ?>
	</p>



	</td>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr>
  <tr>
  </tr> 
</table>
</body>
</html>

<?php 
$html = ob_get_clean();
//echo $html;

require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$dompdf->load_html($html);
$dompdf->setPaper('letter');
//$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("registroActividades.pdf", array('Attachment'=>'0'));

?>