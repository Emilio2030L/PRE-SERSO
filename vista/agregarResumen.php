<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAlumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }

  $nom = $_SESSION['nombreAlumno'];
  $ma = $_SESSION['matriculaAlumno'];

  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");  
  $rowData = mysqli_fetch_array($resultAll);

  $resultAll1 = mysqli_query($mysqli,"SELECT * FROM altalumno WHERE matriculaAlumno = '$ma'");  
  $rowData1 = mysqli_fetch_array($resultAll1);
  
  $consulta="SELECT * FROM altalumno WHERE matriculaAlumno='$ma'";
  $query5=mysqli_query($mysqli,$consulta);
  $row5=mysqli_fetch_array($query5);
  $idA = $row5['idAlta'];

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
                <li><a class="dropdown-item" href="../vista/cartaAceptacion.php">Carta aceptaci??n</a></li>
                <?php if ($row5['estadoliberacion'] == 1) { ?>
                <li><a class="dropdown-item" href="../vista/cartaLiberacion.php">Carta liberaci??n</a></li> <?php } ?>
                <li><a class="dropdown-item" href="../vista/formatoActividades.php">Registro actividades</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <?php if ($row5['estadoliberacion'] == 1) { ?>
              <a class="nav-link active" aria-current="page" href="../vista/registroEvaluacion.php">Evaluaci??nes</a>
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
                    
                      if ($idA == $idAlt) { ?>
                          <li><a class="dropdown-item" href="../vista/editarResumen.php">Editar registro de actividades</a></li>
                <?php     
                      } else { ?>
                        <li><a class="dropdown-item" href="../vista/agregarResumen.php">Registro de actividades</a></li>
                <?php   
                      }
                  }?>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['nombreAlumno'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContra.php">Cambiar contrase??a</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesi??n</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>
    <h5 class="text-dark text-center p-3">Agregar resumen</h5>

    <main>
    <form class="formulario" id="formulario" method="post" action="../control/resumenActividad.php">
      <!-- Grupo: Id asignacion-->
      <div class="formulario__grupo" id="grupo__idAlta">
        <label for="idAlta" class="formulario__label">Id idAlta:</label>
        <div class="formulario__grupo-input">
          <input readonly type="text" class="formulario__input" name="idAlta" id="idAlta" value="<?php echo $rowData1['idAlta']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <!-- Grupo: Resumen actividad  -->
      <div class="formulario__grupo" id="grupo__resumen">
        <label for="resumen" class="formulario__label">Resumen:</label>
        <div class="formulario__grupo-input">
          <textarea class="formulario__input" name="resumen" id="resumen"></textarea>
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <!-- Grupo: Apoyo econ??mico -->
      <div class="formulario_grupo" id="grupo_apoyo">
        <label for="apoyo" class="formulario__label">??Obtuviste apoyo econ??mico?</label>
        <div class="formulario__grupo-input">
                    <select name="apoyo" class="formulario__input" id="apoyo">
                        <option value="No" selected>Sin apoy?? econ??mico</option>            
                        <option value="De 500 a 1000 pesos">De 500 a 1000 pesos</option>
                        <option value="De 1000 a 1500 pesos">De 1000 a 1500 pesos</option>
                        <option value="M??s de 2000 pesos">M??s de 2000 pesos</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>

      <!-- Grupo: Medio -->
      <div class="formulario_grupo" id="grupo_medio">
        <label for="medio" class="formulario__label">??Por medio de donde conseguiste lugar en el servicio social?</label>
        <div class="formulario__grupo-input">
                    <select name="medio" class="formulario__input" id="medio">
                        <option value="Un amigo o familiar" selected>Un amigo o familiar</option> 
                        <option value="Trabajo o trabaje ah??" >Trabajo o trabaje ah??</option>           
                        <option value="Instituto educativo que pertenezco">Instituto educativo que pertenezco</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error"></p>
      </div>


      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formularioAlumno.js"></script>
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