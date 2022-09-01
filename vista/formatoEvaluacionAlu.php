<?php
/*require 'dompdf/autoload.inc.php';*/
require("../conexion/connect_db.php");
  
  $id=$_GET['id'];
  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  $rowData2 = mysqli_fetch_array($resultAll3);

  $resultAll = mysqli_query($mysqli,"SELECT * FROM alumnos INNER JOIN programaeducativo ON programaeducativo.idPrograma = alumnos.idPrograma INNER JOIN altalumno ON altalumno.matriculaAlumno = alumnos.matriculaAlumno INNER JOIN profesores ON profesores.matriculaProfesor = altalumno.matriculaProfesor INNER JOIN evaluacionalumno ON evaluacionalumno.idAlta = altalumno.idAlta INNER JOIN unidadreceptora ON unidadreceptora.idUnidad = profesores.idUnidad WHERE alumnos.matriculaAlumno = '$id' ORDER BY idEvaluacion DESC LIMIT 1");  

  $rowData = mysqli_fetch_array($resultAll);
  /*<?php echo $rowData["nombreAlumno"]; ?>*/
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
			  font-size: 12px;
			  font-family: Franklin Gothic Medium;
			}
			table,tr,td,th{
				border: 1px solid black;
				border-collapse: collapse; 
				font-size: 12px;
			}
			table{
				width: 100%
			}
		</style>
	</head>
<body>
  <table align = center class="default">

  <tr>
    <td rowspan="3"><center><img src="<?php echo $rowData2['foto']; ?>" alt="logo" width="100"></center></td>
    <td rowspan="2" colspan="2" style = "text-align: center ">EVALUACIÓN AL ALUMNO DEL SERVICIO SOCIAL</td>
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
    <td><?php echo $rowData["carrera"] ?></td>
    <td style = "text-align: center; background-color: #CAC7C6; ">Cuatrimestre:</td>
    <td style="text-align: center;"><?php echo $rowData["cuatrimestre"] ?></td>
  </tr>
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Matricula:</td>
    <td><?php echo $rowData["matriculaAlumno"] ?></td>
    <td style = "text-align: center; background-color: #CAC7C6; ">Generación:</td>
    <td style="text-align:center;"><?php echo $rowData["generacion"] ?></td>
  </tr>  
  <tr>
    <td style = "text-align: center; background-color: #CAC7C6; ">Proceso</td>
    <td colspan="3"><?php echo $rowData["proceso"] ?></td>  
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
    <td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">EVALUACIÓN DEL DESEMPEÑO DE LA O EL ESTUDIANTE</td>
  </tr>
  <tr>
    <td style="text-align: center;" colspan="3">ASPECTOS A EVALUAR</td>
    <td style="text-align: center;" >CALIFICACIÓN  </td>
  </tr>
  <tr>
    <td style="text-align: center;" colspan="2" rowspan="5"> Dedicación según el tipo de actividades</td>
    <td style="text-align: center;">Iniciativa personal</td>
    <td style="text-align: center;"><?php echo $rowData["ev1"] ?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Responsabilidad</td>
    <td style="text-align: center;"><?php echo $rowData["ev2"] ?></td>
  </tr>
    <tr>
    <td style="text-align: center;">Liderazgo</td>
    <td style="text-align: center;"><?php echo $rowData["ev3"] ?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Puntualidad</td>
    <td style="text-align: center;"><?php echo $rowData["ev4"] ?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Trabajo dirigido</td>
    <td style="text-align: center;"><?php echo $rowData["ev5"] ?></td>
  </tr>
  <tr>
  <td style="text-align: center;" colspan="2" rowspan="3">Formacion Inicial para cumplir con las actividades que le han asignado en la institución</td>
    <td style="text-align: center;">Conocimientos básicos</td>
    <td style="text-align: center;"><?php echo $rowData["ev6"] ?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Conocimientos técnicos</td>
    <td style="text-align: center;"><?php echo $rowData["ev7"] ?></td>
  </tr>
    <tr>
    <td style="text-align: center;">Habilidades personales</td>
    <td style="text-align: center;"><?php echo $rowData["ev8"] ?></td>
  </tr>
  <tr>
  <td style="text-align: center;" colspan="2" rowspan="2">Formacion Inicial para cumplir con las actividades que le han asignado en la institución</td>
    <td style="text-align: center;">Técnico </td>
    <td style="text-align: center;"><?php echo $rowData["ev9"] ?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Humano</td>
    <td style="text-align: center;"><?php echo $rowData["ev10"] ?></td>
  </tr>
  <tr>
  <td style="text-align: center;" colspan="2" rowspan="3">Otros</td>
    <td style="text-align: center;">Toma de decisiones </td>
    <td style="text-align: center;"><?php echo $rowData["ev11"] ?></td>
  </tr>
  <tr>
    <td style="text-align: center;">Objetuvos logrados</td>
    <td style="text-align: center;"><?php echo $rowData["ev12"] ?></td>
  </tr>
    <tr>
    <td style="text-align: center;">Presentacion de informes y resultados</td>
    <td style="text-align: center;"><?php echo $rowData["ev13"] ?></td>
  </tr>
  <tr>
    <td colspan="4" style = "text-align: center; background-color: #CAC7C6; ">MEDICIÓN DE SATISFACCIÓN</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;">ASPECTOS A EVALUAR</td>
    <td>CALIFICACIÓN</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align: center;">Grado de satisfacción general de nuestro(a) estudiante en su organización</td>
    <td style="text-align:center;"><?php echo $rowData["ev14"] ?></td>
  </tr>
    <tr>
    <td colspan="3" style="text-align: center;">Aspectos que mas valora en su organización</td>
    <td style="text-align:center;"><?php echo $rowData["ev15"] ?></td>
  </tr>
  <tr>
    <td style="text-align:center;">¿Contrataria al estudiante?</td>
    <td style="text-align:center;"><?php echo $rowData["ev16"] ?></td>
    <td style="text-align:center;">¿Volveria a recibir estudiantes de este instituto?</td>
    <td style="text-align:center;"><?php echo $rowData["ev17"] ?></td>
  </tr>
  <tr>
    <td colspan="4">¿Por que? <?php echo $rowData["ev18"] ?></td>
  </tr>
  <tr>
    <td colspan="4">¿Que conocimientos deberia reforzar? <?php echo $rowData["ev19"] ?></td>
  </tr>

</table>
  <br>
  <br>
  <br>
  <div style="position:absolute; right:10;">
    <div style=" border-top: 1px solid black; height: 2px; max-width: 200px; padding: 0; margin: 40px;">
      <p style="text-align:center; line-height:0px;"><?php echo $var1 ?></p>
    </div>
  </div>
  <div style="position:absolute; left:10;">
    <div style=" border-top: 1px solid black; height: 2px; max-width: 200px; padding: 0; margin: 40px;">
      <p style="text-align:center; line-height:0px;">Unidad receptora</p>
    </div>
  </div>
  <br>
  <div style="  border-top: 1px solid black; height: 2px; max-width: 200px; padding: 0; margin: 40px auto 0 auto;">
    <p style="text-align:center;"><?php echo $var2 ?></p>
    <p style="text-align:center; line-height:0px;"><?php echo $rowData["puestoProfesor"] ?></p>
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
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));

?>