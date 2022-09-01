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

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM unidadreceptora WHERE idUnidad='$id'";
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
    <h5 class="text-dark text-center">Registro unidad receptora</h5>

    <main>
    <form class="formulario" id="formulario">
      <!-- Grupo: Nombre Unidad  -->
      <div class="formulario__grupo" id="grupo__idUnidad">
        <label for="idUnidad" class="formulario__label">Id Unidad:</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="idUnidad" id="idUnidad" value="<?php echo $row['idUnidad']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Nombre Unidad  -->
      <div class="formulario__grupo" id="grupo__nombreUnidad">
        <label for="nombreUnidad" class="formulario__label">Nombre unidad:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreUnidad" id="nombreUnidad" value="<?php echo $row['nombreUnidad']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 40 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Domicilio Unidad -->
      <div class="formulario__grupo" id="grupo__domicilioUni">
        <label for="domicilioUni" class="formulario__label">Domicilio unidad:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="domicilioUni" id="domicilioUni" value="<?php echo $row['domicilioUni']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Telefono Uni-->
      <div class="formulario__grupo" id="grupo__telefonoUni">
        <label for="telefonoUni" class="formulario__label">Telefono unidad:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="telefonoUni" id="telefonoUni" value="<?php echo $row['telefonoUni']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
      </div>

      <!-- Grupo: Giro empresarial -->
      <div class="formulario_grupo" id="grupo_giroEmpresarial">
        <label for="giroEmpresarial" class="formulario__label">Giro empresarial:</label>
        <div class="formulario__grupo-input">
                    <select name="giroEmpresarial" class="formulario__input" id="giroEmpresarial">
                        <option value="<?php echo $row['giroEmpresarial']  ?>" selected><?php echo $row['giroEmpresarial'] ?></option> 
                        <option value="Micro">Micro</option> 
                        <option value="Pequeña" >Pequeña</option>            
                        <option value="Mediana">Mediana</option>
                        <option value="Grande">Grande</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>
      <!-- Grupo: Numero de trabajadores -->
      <div class="formulario_grupo" id="grupo_numTrabajadores">
        <label for="numTrabajadores" class="formulario__label">Numero de trabajadores:</label>
        <div class="formulario__grupo-input">
                    <select name="numTrabajadores" class="formulario__input" id="numTrabajadores">
                        <option value="<?php echo $row['numTrabajadores'] ?>" selected><?php echo $row['numTrabajadores'] ?> tabajadores</option>
                        <option value="1-10" >1-10 trabajadores</option> 
                        <option value="11-50" >11-50 trabajadores</option>            
                        <option value="51-250">51-250 trabajadores</option>
                        <option value="251">+251 trabajadores</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="actUnidad()">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formularioUnidad.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>