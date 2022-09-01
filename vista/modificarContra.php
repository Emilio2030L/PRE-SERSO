<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAlumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }

  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");  
  $rowData = mysqli_fetch_array($resultAll);

  $nom = $_SESSION['nombreAlumno'];
  $ma = $_SESSION['matriculaAlumno'];

  $sql="SELECT * FROM alumnos WHERE matriculaAlumno='$ma'";
  $query=mysqli_query($mysqli,$sql);
  $row1=mysqli_fetch_array($query);

  $consulta="SELECT * FROM altalumno WHERE matriculaAlumno='$ma'";
  $query5=mysqli_query($mysqli,$consulta);
  $row5=mysqli_fetch_array($query5);
  $idA = $row5['idAlta'];

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
              <a class="nav-link active" aria-current="page" href="../vista/indexAlumno.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Generar
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/cartaAceptacion.php">Carta aceptación</a></li>
                <?php if ($row5['estadoliberacion'] == 1) { ?>
                <li><a class="dropdown-item" href="../vista/cartaLiberacion.php">Carta liberación</a></li> <?php } ?>
                <li><a class="dropdown-item" href="../vista/formatoActividades.php">Registro actividades</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <?php if ($row5['estadoliberacion'] == 1) { ?>
              <a class="nav-link active" aria-current="page" href="../vista/registroEvaluacion.php">Evaluaciónes</a>
              <?php } ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/registroAvance.php">Avance de actividades</a></li>
                <?php
                  $getnombreA = "SELECT * FROM registroactividades";
                  $getnombreA1 = mysqli_query($mysqli,$getnombreA);
                  while ($row = mysqli_fetch_array($getnombreA1)) {    
                    $idAlt=$row['idAlta'];
                    
                      if ($idAlt == $idA) { ?>
                          <li><a class="dropdown-item" href="../vista/editarResumen.php">Editar registro de actividades</a></li>
                <?php     
                      }} if($idAlt != $idA) { ?>
                        <li><a class="dropdown-item" href="../vista/agregarResumen.php">Registro de actividades</a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['nombreAlumno'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContra.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>
    <h5 class="font-weight-bold mb-4 text-center p-3">Modificar contraseña alumno</h5>

    <main>
    <form class="formulario" action="../control/cambiarPassword.php" method="post">
      <!-- Grupo: matricula Alumno-->
      <div class="formulario__grupo" id="grupo__matriculaAlumno">
        <label for="matriculaAlumno" class="formulario__label">Matricula alumno</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="matriculaAlumno" id="matriculaAlumno" value="<?php echo $row1['matriculaAlumno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">ingrese</p>
      </div>

      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Nombre alumno</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="nombreAlumno" id="nombreAlumno" value="<?php echo $row1['nombreAlumno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__apellidoPpaterno">
        <label for="apellidoPpaterno" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="apellidoPpaterno" id="apellidoPpaterno" value="<?php echo $row1['apellidoPpaterno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__apellidoMaterno">
        <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="apellidoMaterno" id="apellidoMaterno" value="<?php echo $row1['apellidoMaterno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Contraseña -->
      <div class="formulario__grupo" id="grupo__passwordAlumno">
        <label for="passwordAlumno" class="formulario__label">Nueva contraseña</label>
        <div class="formulario__grupo-input">
          <input type="password" class="formulario__input" name="passwordAlumno" id="passwordAlumno">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>