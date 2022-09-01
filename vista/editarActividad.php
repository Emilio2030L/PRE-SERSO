<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreProfesor']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }

  $resultMatri = $_SESSION['matriculaProfesor'];
  

  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");  
  $rowData = mysqli_fetch_array($resultAll);

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM asignacion INNER JOIN altalumno ON altalumno.idAlta = asignacion.idAlta INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno WHERE idAsignacion ='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/estilos.css" />


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
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>
    <h5 class="text-dark text-center">Edición de actividades</h5>

    <main>
    <form class="formulario" id="formulario" method="post" action="../control/cambiarAsignacion.php">
      <!-- Grupo: Descripcion actividad  -->
      <div class="formulario__grupo" id="grupo__idAsignacion">
        <label for="idAsignacion" class="formulario__label">Describa actividad a realizar:</label>
        <div class="formulario__grupo-input">
          <input readonly type="list" class="formulario__input" name="idAsignacion" id="idAsignacion" value="<?php echo $row['idAsignacion']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La descripción debe contener al menos 10 caracteres y máximo 50 </p>
      </div>

      <!-- Grupo: Descripcion actividad  -->
      <div class="formulario__grupo" id="grupo__actividadRealizar">
        <label for="actividadRealizar" class="formulario__label">Describa actividad a realizar:</label>
        <div class="formulario__grupo-input">
          <textarea class="formulario__input" name="actividadRealizar" id="actividadRealizar"><?php echo $row['actividadRealizar']  ?></textarea>
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <!-- Grupo: Fecha asignacion  -->
      <div class="formulario__grupo" id="grupo__fecha">
        <label for="fecha" class="formulario__label">Ingrese fecha límite:</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" name="fecha" id="fecha" value="<?php echo $row['fecha']  ?>" >
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Seleccione la fecha limite </p>
      </div>

      <!-- Grupo: Asignar alumno -->
      <div class="formulario_grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Asignar actividad A:</label>
        <div class="formulario__grupo-input">
                    <select name="nombreAlumno" class="formulario__input" id="nombreAlumno">
                      <option value="<?php echo $row['nombreAlumno']  ?>" selected><?php echo $row['nombreAlumno']  ?></option>  
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="regAsig()">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>