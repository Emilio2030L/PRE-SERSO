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

  $sql="SELECT * FROM profesores WHERE matriculaProfesor='$val'";
  $query=mysqli_query($mysqli,$sql);
  $row=mysqli_fetch_array($query);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">
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
              <a class="nav-link active" aria-current="page" href="../vista/evaluacionAlumno.php">Evaluacion Alumnos</a>
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
    <h5 class="font-weight-bold mb-4 text-center p-3">Modificar contraseña alumno</h5>

    <main>
    <form class="formulario" action="../control/cambiarPasswordDo.php" method="post">
      <!-- Grupo: matricula Alumno-->
      <div class="formulario__grupo" id="grupo__matriculaProfesor">
        <label for="matriculaProfesor" class="formulario__label">Matricula profesor:</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="matriculaProfesor" id="matriculaProfesor" value="<?php echo $row['matriculaProfesor']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreProfesor">
        <label for="nombreProfesor" class="formulario__label">Nombre profesor:</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="nombreProfesor" id="nombreProfesor" value="<?php echo $row['nombreProfesor']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <!-- Grupo: Nuevo password -->
      <div class="formulario__grupo" id="grupo__passwordProfesor">
        <label for="passwordProfesor" class="formulario__label">Nueva contraseña:</label>
        <div class="formulario__grupo-input">
          <input type="password" class="formulario__input" name="passwordProfesor" id="passwordProfesor">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <input type="submit" class="formulario__btn" value="Registrar" name="btnReg">
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>