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

  $resultAll = mysqli_query($mysqli,"SELECT * FROM evaluacionunidad INNER JOIN unidadreceptora ON unidadreceptora.idUnidad = evaluacionunidad.idUnidad INNER JOIN profesores ON profesores.idUnidad = unidadreceptora.idUnidad INNER JOIN alumnos ON alumnos.matriculaAlumno = evaluacionunidad.matriculaAlumno INNER JOIN programaeducativo ON programaeducativo.idPrograma = alumnos.idPrograma WHERE alumnos.matriculaAlumno = '$ma' ORDER BY idEvaluacionUnidad DESC LIMIT 1");  
  $rowData = mysqli_fetch_array($resultAll);

  $h = " ";
  $var1 = $rowData["nombreAlumno"] . $h . $rowData["apellidoPpaterno"] . $h . $rowData["apellidoMaterno"];
  $var2 = $rowData["nombreProfesor"] . $h . $rowData["apellidoPaterno"] . $h . $rowData["apellidoMmaterno"];

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
    <td rowspan="3"><center><img src="<?php echo $rowData2['foto']; ?>" alt="logo" width="120"></center></td>
    <td rowspan="2" colspan="2" style = "text-align: center ">EVALUACIÓN AL ENCARGADO DEL SERVICIO SOCIAL</td>
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
    <td colspan="3"><?php echo $var1; ?></td>
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Carrera:</td>
    <td><?php echo $rowData["carrera"]; ?></td>
    <td style = "text-align: center; background-color: #CAC7C6; ">Cuatrimestre:</td>
    <td style="text-align: center;"><?php echo $rowData["cuatrimestre"]; ?></td>
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Matricula:</td>
    <td><?php echo $rowData["matriculaAlumno"]; ?></td>
    <td style = "text-align: center; background-color: #CAC7C6; ">Generación:</td>
    <td style="text-align:center;"><?php echo $rowData["generacion"]; ?></td>
  </tr>  
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Proceso</td>
    <td colspan="3"><?php echo $rowData["proceso"]; ?></td>  
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Periodo servicio social:</td>
    <td colspan="3">De <?php echo $rowData["fechaInicio"] ?> a <?php echo $rowData["fechaFin"] ?></td>  
  </tr>    
  <tr>
    <td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">INFORMACIÓN DE LA UNIDAD REPECTORA</td>
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Nombre de la organización:</td>
    <td colspan="3"><?php echo $rowData["nombreUnidad"] ?></td>
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Dirección de la organización:</td>
    <td colspan="3"><?php echo $rowData["domicilioUni"] ?></td>
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Nombre del Responsable:</td>
    <td><?php echo $var2 ?></td>
    <td style = "text-align: center; background-color: #CAC7C6; ">Puesto:</td>
    <td><?php echo $rowData["puestoProfesor"] ?></td>
  </tr>  
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Correo electrónico:</td>
    <td colspan="3"><?php echo $rowData["correProfesor"] ?></td>
  </tr>  
  <tr>
    <td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">EVALUACIÓN DEL O LA ENCARGADA DEL SERVICIO SOCIAL</td>
  </tr>
  <tr>
    <td style="text-align: center;" colspan="3">ASPECTOS A EVALUAR</td>
    <td style="text-align: center;">CALIFICACIÓN</td>
  </tr>
  <tr>
    <td colspan="3">¿Consideras que la persona responsable de tu Servicio Social, tuvos los conocimientos necesarios para el desarrollo de tus actividades que te fueron encomendadas?</td>
    <td style="text-align: center;"><?php echo $rowData["pre1"] ?></td>
  </tr>
    <tr>
    <td colspan="3">¿La organización te proporcionó insumos e información necesaria para el desarrollo y logro de tus actividades encomendadas en tu servicio social?</td>
    <td style="text-align: center;"><?php echo $rowData["pre2"] ?></td>
  </tr>
    <tr>
    <td colspan="3">¿La organización te proporcionó equipo y herramientas necesarias para el desarrollo de tu servicio social?</td>
    <td style="text-align: center;"><?php echo $rowData["pre3"] ?></td>
  </tr>
  <tr>
    <td colspan="3">¿El número de horas que estuviste en la organización fueron adecuadas para lograr las actividades de tu servicio social?</td>
    <td style="text-align: center;"><?php echo $rowData["pre4"] ?></td>
  </tr>
  <tr>
    <td colspan="3">¿Consideras que en esta organización existe equidad de género e igualdad laboral?</td>
    <td style="text-align: center;"><?php echo $rowData["pre5"] ?></td>
  </tr>
  <tr>
    <td colspan="3">¿Recomendarias a esta organización para que otros estudiantes realicen el servicio social?</td>
    <td style="text-align: center;"><?php echo $rowData["pre6"] ?></td>
  </tr>
  <tr>
    <td colspan="3">Si la organización donde realizaste tu proyecto te diese la oportunidad de formar parte de sus colaboradores ¿Te interesaria o gustaria trabajar ahi?</td>
    <td style="text-align: center;"><?php echo $rowData["pre7"] ?></td>
  </tr>
  <tr>
    <td colspan="3">El trato del personal hacia ti fue:</td>
    <td style="text-align: center;"><?php echo $rowData["pre8"] ?></td>
  </tr>
  <tr>
  <td>Observaciones:</td>
  <td colspan="3"><?php echo $rowData["pre9"] ?></td>
  </tr>

</table>
  <br>
  <br>
  <br>
  <div style="position:absolute; right:10;">
    <div style=" border-top: 1px solid black; height: 2px; max-width: 200px; padding: 0; margin: 50px;">
      <p style="text-align:center;"><?php echo $var2 ?></p>
      <p style="text-align:center; line-height:0px;"><?php echo $rowData["puestoProfesor"] ?></p>
    </div>
  </div>
  <div style="position:absolute; left:10;">
    <div style=" border-top: 1px solid black; height: 2px; max-width: 200px; padding: 0; margin: 50px;">
      <p style="text-align:center;"><?php echo $var1 ?></p>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <div style="  border-top: 1px solid black; height: 2px; max-width: 200px; padding: 0; margin: 50px auto 0 auto;">
    <p style="text-align:center;">Dirección de vinculación</p>
  </div>
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
$dompdf->stream("evaluacionEncargado.pdf", array('Attachment'=>'0'));

?>