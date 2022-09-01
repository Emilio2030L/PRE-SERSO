<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['NombreUsuario']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=1) {
    header("Location:../vista/indexAdmin.php");
  }

  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");  
  $rowData = mysqli_fetch_array($resultAll);

  $sql="SELECT *FROM unidadreceptora";
  $query=mysqli_query($mysqli,$sql);

  $sql1="SELECT *FROM profesores";
  $query1=mysqli_query($mysqli,$sql1);

  $sql2="SELECT *FROM programaeducativo";
  $query2=mysqli_query($mysqli,$sql2);

?>
<html lang="en">
  <head>
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
  <section>
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
              <a class="nav-link active" aria-current="page" href="../vista/indexAdmin.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/registroDocente.php">Docente</a></li>
                <li><a class="dropdown-item" href="../vista/registroUnidad.php">Unidad receptora</a></li>
                <li><a class="dropdown-item" href="../vista/programaEducativo.php">Programa Educativo</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/agregarLogo.php">Agregar logo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Base de datos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/respaldo.php">Respaldo</a></li>
                <li><a class="dropdown-item" href="../vista/restauracion.php">Restauración</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['NombreUsuario'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>

    <p style="text-align: center; font-size: 20px; ">Tabla Docente</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablay" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Paterno</th>
            <th style="text-align: center">Materno</th>
            <th style="text-align: center">Género</th>
            <th style="text-align: center" >Puesto</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query1)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row['matriculaProfesor']?></th>
              <th style="text-align: center"><?php  echo $row['nombreProfesor']?></th>
              <th style="text-align: center"><?php  echo $row['apellidoPaterno']?></th>
              <th style="text-align: center"><?php  echo $row['apellidoMmaterno']?></th>
              <th style="text-align: center"><?php  echo $row['generoProfesor']?></th>
              <th style="text-align: center"><?php  echo $row['puestoProfesor']?></th> 

              <th style="text-align: center"><a href="../vista/editarProfesor.php?id=<?php echo $row['matriculaProfesor'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaProfe()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarProfesor.php?id=<?php echo $row['matriculaProfesor'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarProfe()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <script type="text/javascript">
        function confirmarActualizaProfe(){
            var respuesta = confirm("¿Confirma actualizar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }

        function confirmarEliminarProfe(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>

    <p style="text-align: center; font-size: 20px; ">Tabla Unidad</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Dirección</th>
            <th style="text-align: center">Telefono</th>
            <th style="text-align: center" >Giro</th>
            <th style="text-align: center"  >N. Trabajadores</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row['idUnidad']?></th>
              <th style="text-align: center"><?php  echo $row['nombreUnidad']?></th>
              <th style="text-align: center"><?php  echo $row['domicilioUni']?></th>
              <th style="text-align: center"><?php  echo $row['telefonoUni']?></th>
              <th style="text-align: center"><?php  echo $row['giroEmpresarial']?></th>
              <th style="text-align: center"><?php  echo $row['numTrabajadores']?></th> 

              <th style="text-align: center"><a href="../vista/editarUnidad.php?id=<?php echo $row['idUnidad'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaUni()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarUnidad.php?id=<?php echo $row['idUnidad'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarUni()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <script type="text/javascript">
        function confirmarActualizaUni(){
            var respuesta = confirm("¿Confirma actualizar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }

        function confirmarEliminarUni(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>


    <p style="text-align: center; font-size: 20px; ">Tabla Programa Educativo</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablaz" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query2)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row['idPrograma']?></th>
              <th style="text-align: center"><?php  echo $row['carrera']?></th>

              <th style="text-align: center"><a href="../vista/editarPrograma.php?id=<?php echo $row['idPrograma'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaPro()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarPrograma.php?id=<?php echo $row['idPrograma'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarPro()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>

        <script type="text/javascript">
        function confirmarActualizaPro(){
            var respuesta = confirm("¿Confirma actualizar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }

        function confirmarEliminarPro(){
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

    <script>
        $(document).ready(function () {
            $('#tablay').DataTable({
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

    <script>
        $(document).ready(function () {
            $('#tablaz').DataTable({
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
    </section>
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