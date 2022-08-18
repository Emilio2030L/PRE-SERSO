<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreProfesor']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }


  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");  
  $rowData = mysqli_fetch_array($resultAll);

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM altalumno INNER JOIN alumnos ON alumnos.matriculaAlumno = altalumno.matriculaAlumno WHERE alumnos.matriculaAlumno='$id'";
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


    <title>Hello, world!</title>
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
              <a class="nav-link active" aria-current="page" href="../control/evaluacionAlumno.php">Evaluacion Alumnos</a>
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

    <h1 class="text-dark text-center p-3">Evaluación alumno</h1>

    <main>
    <form class="formulario" id="formulario" method="post" action="../vista/formatoEvaluacionAlu.php">
      <!-- Grupo: matricula Alumno-->
      <div class="formulario__grupo" id="grupo__idAlta">
        <label for="idAlta" class="formulario__label">id Alta</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="idAlta" id="idAlta" value="<?php echo $row['idAlta']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">ingrese</p>
      </div>

      <!-- Grupo: matricula Alumno-->
      <div class="formulario__grupo" id="grupo__matriculaAlumno">
        <label for="matriculaAlumno" class="formulario__label">Matricula alumno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="matriculaAlumno" id="matriculaAlumno" value="<?php echo $row['matriculaAlumno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">ingrese</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev1">
        <label for="ev1" class="formulario__label">Iniciativa personal</label>
        <div class="formulario__grupo-input">
                    <select name="ev1" class="formulario__input" id="ev1">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev2">
        <label for="ev2" class="formulario__label">Responsabilidad</label>
        <div class="formulario__grupo-input">
                    <select name="ev2" class="formulario__input" id="ev2">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev3">
        <label for="ev3" class="formulario__label">Liderazgo</label>
        <div class="formulario__grupo-input">
                    <select name="ev3" class="formulario__input" id="ev3">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev4">
        <label for="ev4" class="formulario__label">Puntualidad</label>
        <div class="formulario__grupo-input">
                    <select name="ev4" class="formulario__input" id="ev4">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev5">
        <label for="ev5" class="formulario__label">Trabajo dirigido</label>
        <div class="formulario__grupo-input">
                    <select name="ev5" class="formulario__input" id="ev5">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev6">
        <label for="ev6" class="formulario__label">Conocimientos básicos</label>
        <div class="formulario__grupo-input">
                    <select name="ev6" class="formulario__input" id="ev6">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev7">
        <label for="ev7" class="formulario__label">Conocimientos técnicos</label>
        <div class="formulario__grupo-input">
                    <select name="ev7" class="formulario__input" id="ev7">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev8">
        <label for="ev8" class="formulario__label">Habilidades personales</label>
        <div class="formulario__grupo-input">
                    <select name="ev8" class="formulario__input" id="ev8">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev9">
        <label for="ev9" class="formulario__label">Técnico</label>
        <div class="formulario__grupo-input">
                    <select name="ev9" class="formulario__input" id="ev9">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev10">
        <label for="ev10" class="formulario__label">Humano</label>
        <div class="formulario__grupo-input">
                    <select name="ev10" class="formulario__input" id="ev10">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev11">
        <label for="ev11" class="formulario__label">Toma de decisiónes</label>
        <div class="formulario__grupo-input">
                    <select name="ev11" class="formulario__input" id="ev11">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev12">
        <label for="ev12" class="formulario__label">Objetivos logrados</label>
        <div class="formulario__grupo-input">
                    <select name="ev12" class="formulario__input" id="ev12">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev13">
        <label for="ev13" class="formulario__label">Presentación de informes y resultados</label>
        <div class="formulario__grupo-input">
                    <select name="ev13" class="formulario__input" id="ev13">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev14">
        <label for="ev14" class="formulario__label">Grado de satisfacción general de nuestro(a) estudiante en su organización </label>
        <div class="formulario__grupo-input">
                    <select name="ev14" class="formulario__input" id="ev14">
                        <option value="6" selected>Escaso</option> 
                        <option value="7" >Medio</option>            
                        <option value="8">Bueno</option>
                        <option value="9">Muy bueno</option>
                        <option value="10">Excelente</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev15">
        <label for="ev15" class="formulario__label">Aspectos que mas valora en su organización</label>
        <div class="formulario__grupo-input">
                    <select name="ev15" class="formulario__input" id="ev15">
                        <option value="Preparar futuro profesional" selected>Preparar futuro profesional</option> 
                        <option value="Colaborar en la formación del estudiante" >Colaborar en la formación del estudiante</option>            
                        <option value="La actividad realizada por el estudiante">La actividad realizada por el estudiante</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


            <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev16">
        <label for="ev16" class="formulario__label">¿Contrataria al estudiante?</label>
        <div class="formulario__grupo-input">
                    <select name="ev16" class="formulario__input" id="ev16">
                        <option value="Si" selected>Si</option> 
                        <option value="No" >No</option>   
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

                  <!-- Grupo: -->
      <div class="formulario_grupo" id="grupo_ev17">
        <label for="ev17" class="formulario__label">¿Volveria a recibir estudiantes de este instituto?</label>
        <div class="formulario__grupo-input">
                    <select name="ev17" class="formulario__input" id="ev17">
                        <option value="Si" selected>Si</option> 
                        <option value="No" >No</option>   
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: -->
      <div class="formulario__grupo" id="grupo__ev18">
        <label for="ev18" class="formulario__label">¿Por que?</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="ev18" id="ev18" >
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">ingrese</p>
      </div>

            <!-- Grupo: -->
      <div class="formulario__grupo" id="grupo__ev19">
        <label for="ev19" class="formulario__label">¿Que conocimientos deberia reforzar?</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="ev19" id="ev19" >
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">ingrese</p>
      </div>


      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Evaluar</button>
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