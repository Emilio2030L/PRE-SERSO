<?php
/*require 'dompdf/autoload.inc.php';*/
require("../conexion/connect_db.php");
  //para crear una sesion o reaunar 
  session_start();
  //corroboramos que realmente exista el usuario y en caso de no existir regresamos al inicio de sesion
  if (@!$_SESSION['nombreAlumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }
  //obtencion de nombre alumno iniciado en la sesion
  $nom = $_SESSION['nombreAlumno'];
  //consulta imagen logotipo
  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  //obtencion del registro
  $rowData2 = mysqli_fetch_array($resultAll3);
  //consulta de la tabla altalumno, alumnos, profesores y programa educativo
  $resultAll = mysqli_query($mysqli," SELECT * FROM altalumno INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno inner join profesores ON profesores.matriculaProfesor = altalumno.matriculaProfesor INNER JOIN programaeducativo ON programaeducativo.idPrograma = alumnos.idPrograma WHERE nombreAlumno = '$nom'; ");  
  //obtencion de la informacion del alumno
  $rowData = mysqli_fetch_array($resultAll);
  /*<?php echo $rowData["nombreAlumno"]; ?>*/
  // variable usada para el espacio del texto
  $h = " ";
  //asignamos a var 1 nombre completo del alumno
  $var1 = $rowData["nombreAlumno"] . $h . $rowData["apellidoPpaterno"] . $h . $rowData["apellidoMaterno"];
  //asignamos a var 2 el nombre de la carrera
  $var2 = $rowData["carrera"];
  //asignamos a var 3 el nombre completo del profesor
  $var3 = $rowData["nombreProfesor"] . $h . $rowData["apellidoPaterno"] . $h . $rowData["apellidoMmaterno"];
  //asignamos la fecha de incio del servicio social
  $var4 = strtotime($rowData["fechaInicio"]);
  //obtencion del mes
  $mes = date("m", $var4);
  //asignamos a var 5 fecha fin
  $var5 = $rowData["fechaFin"];
  //funcion stroupper para mayusculas
  $var1 = strtoupper($var1);
  $var2 = strtoupper($var2);
  $var3 = strtoupper($var3);
  //borramos el buffer para despues asignar a una variable y crear el PDF
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
<h1> LUGAR Y FECHA DE EXPEDICIÓN </h1>
<h1> Asunto: Carta de aceptación del servicio social </h1>
</div>
<div ALIGN=letf>
<h1> Lic. Naylete Priscilia Segura DíazDirectora de Vinculación </h1>
<h1> Universidad Politécnica del Estado de Morelos </h1>
<h1> Presente: </h1>
</div>
<div>
<p style = "font-size: 20px; text-align: justify ">
Por éste medio permito informarle que el alumno(a) <?php echo $var1 ?>, con número de matrícula
<?php echo $rowData["matriculaAlumno"]; ?> inscrito(a) en <?php echo $rowData["cuatrimestre"]; ?> cuatrimestre, de la carrera
<?php echo $var2 ?> de la Universidad Politécnica del Estado de
Morelos UPEMOR ha sido aceptado para realizar su Servicio Social
reglamentario en esta Organización, desarrollando tareas diversas,
cubriendo un total de 480 hrs en el periodo de <?php echo $mes; ?> a <?php echo $var5; ?> DEBERÁN SER 6 MESES COMPLETOS.
</p>
<p style = "font-size: 20px; text-align: justify ">
El alumno estará a cargo de <?php echo $var3 ?> quien será la persona autorizada para la firma de los
formatos adicionales.
</p>
<p style = "font-size: 20px; text-align: justify ">
Sin más por el momento quedo atento de usted.
</p>
<p style = "font-size: 20px; text-align: center ">
Atentamente
</p>
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
//devolvemos el contenido del buffer
$html = ob_get_clean();
//echo $html;
//conectamos con la libreria dompdf
require '../vista/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// instanciar variable dompdf
$dompdf = new Dompdf();
//carga del codigo html
$dompdf->load_html($html);
//formato tamaño carta 
$dompdf->setPaper('letter');
//formato horizontal
//$dompdf->setPaper('A4', 'landscape');
//mostrar en el navegador
$dompdf->render();
//Generamos el formato para que se pueda ver con la nomenclatura del documento y terminacion PDF
$dompdf->stream("cartaAceptacion.pdf", array('Attachment'=>'0'));?>