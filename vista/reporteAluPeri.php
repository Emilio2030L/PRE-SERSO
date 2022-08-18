<?php
/*require 'dompdf/autoload.inc.php';*/
require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreProfesor']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }
  
  $ma = $_SESSION['matriculaProfesor'];

  $fe1 = $_POST['Fecha1'];
  $fe2 = $_POST['Fecha2'];

  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  $rowData2 = mysqli_fetch_array($resultAll3);

  $sql="SELECT * FROM altalumno INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno INNER JOIN programaeducativo ON programaeducativo.idPrograma = alumnos.idPrograma AND fechaInicio BETWEEN '$fe1' AND '$fe2' AND matriculaProfesor = '$ma';";
  
  $query=mysqli_query($mysqli,$sql);
  /*<?php echo $rowData["nombreAlumno"]; ?>*/
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
  <div ALIGN = center>
    <img src="<?php echo $rowData2['foto']; ?>" alt="logo" width="100">
    <h1>Listado de alumnos del servicio social</h1>
  </div>
  
      <table id="tablax" class="table table-striped table-bordered">
        <tr>
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido Paterno</th>
            <th style="text-align: center">Apellido Materno</th>
            <th>Programa</th>
            <th>Cuatrimestre</th>
            <th>Grupo</th>
            <th>Generacion</th>
            <th>Carrera</th>
        </tr>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row['matriculaAlumno']?></th>
              <th style="text-align: center"><?php  echo $row['nombreAlumno']?></th>
              <th style="text-align: center"><?php  echo $row['apellidoPpaterno']?></th>
              <th style="text-align: center"><?php  echo $row['apellidoMaterno']?></th>
              <th style="text-align: center"><?php  echo $row['idPrograma']?></th>
              <th style="text-align: center"><?php  echo $row['cuatrimestre']?></th>
              <th style="text-align: center"><?php  echo $row['grupo']?></th>   
              <th style="text-align: center"><?php  echo $row['generacion']?></th> 
              <th style="text-align: center"><?php  echo $row['carrera']?></th>   
            </tr>
            <?php } ?>
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
//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("documento.pdf", array('Attachment'=>'0'));

?>