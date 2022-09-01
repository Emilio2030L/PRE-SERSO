<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreProfesor']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }

  $val = $_SESSION['matriculaProfesor'];

  $sql="SELECT *FROM altalumno INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno WHERE matriculaProfesor = '$val'";
  $query=mysqli_query($mysqli,$sql);

  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");  
  $rowData = mysqli_fetch_array($resultAll);
?>
<html lang="en">
  <head>
    <style>
      th,td {
            padding: 0.4rem !important;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/estilos.css" />
    <link rel="stylesheet" href="../vista/style/estilos1.css" />

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Servicio social</title>
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="<?php echo $rowData['foto']; ?>" alt="logo" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/indexDocente.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/registroAlumno.php">Alumno</a></li>
                <li><a class="dropdown-item" href="../vista/asignarActividad.php">Asignar actividades</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/avanceActividades.php">Avance de actividades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/evaluacionAlumno.php">Evaluación Alumnos</a>
            </li>
            </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['nombreProfesor'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraDo.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1 class="font-weight-bold mb-4 p-3 text-center">Sistema web servicio social UPEMOR</h1>
    <div class="container" >    
    <form method="post" action="../vista/reporteAluPeri.php" class="formulario p-3 mb-2">
        <div class="row">    
            <label for="RangoFech" class="formulario__label">Seleccione rango de fechas o programa educativo:</label>
            <div class="col-lg-5">
                <input type="date" name="Fecha1" class="form-control">
            </div>
            <div class="col-lg-5">
                <input type="date" name="Fecha2" class="form-control">
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-4">
                <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
            </div>
        </div>    
    </form>
    </div>

    <div class="container" >    
    <form method="post" action="../vista/reporteAluPro.php" class="formulario p-3 mb-2">
        <div class="row">    
            <label for="RangoFech" class="formulario__label">Seleccione rango de fechas o programa educativo:</label>
            <div class="col-lg-5">
                <select name="idPrograma" class="formulario__input" id="idPrograma">
                        <?php
                        require("../conexion/connect_db.php");
                        $getprograma = "SELECT * FROM programaeducativo";
                        $getprograma1 = mysqli_query($mysqli,$getprograma);

                        while ($row = mysqli_fetch_array($getprograma1)) {
                          $id=$row['idPrograma'];
                          $nombre=$row['carrera'];
                        
                        ?>
                      <option value="<?php echo $id;  ?>"><?php echo $nombre;  ?></option>  
                      <?php 
                        }
                      ?>
                </select>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-4">
                <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
            </div>
        </div>    
    </form>
    </div>

    <br>
    <p style="text-align: center; font-size: 20px; ">Tabla Alumno</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido P</th>
            <th style="text-align: center">Apellido M</th>
            <th>Programa</th>
            <th>Cuatrimestre</th>
            <th>Grupo</th>
            <th>Generacion</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
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

              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matriculaAlumno'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar o liberar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matriculaAlumno'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>

    <script type="text/javascript">
        function confirmarActualizaAlu(){
            var respuesta = confirm("¿Confirma actualizar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }

        function confirmarEliminarAlu(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>

    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 400,
                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>

    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="<?php echo $rowData['foto']; ?>" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Dirección: Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550</p>
                <p>Tel: (777) 229-3517 </p>        
                <p>Email: informes@upemor.edu.mx</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>Aslin Emilio Lopez Mancillas</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>

</html>