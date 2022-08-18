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

    <h1 class="text-dark text-center">Registro alumnos</h1>

    <main>
    <form class="formulario" id="formulario">
      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Nombre alumno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreAlumno" id="nombreAlumno" placeholder="EJ: Eliel">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__apellidoPpaterno">
        <label for="apellidoPpaterno" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoPpaterno" id="apellidoPpaterno" placeholder="EJ: Eliel">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__apellidoMaterno">
        <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoMaterno" id="apellidoMaterno" placeholder="EJ: Velazquez">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Fecha inicio servicio -->
      <div class="formulario__grupo" id="grupo__fechaInicio">
        <label for="fechaInicio" class="formulario__label">Fecha Inicio:</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" name="fechaInicio" id="fechaInicio">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">error seleccione fecha</p>
      </div>

      <!-- Grupo: Fecha fin servicio -->
      <div class="formulario__grupo" id="grupo__fechaFin">
        <label for="fechaFin" class="formulario__label">Fecha Fin:</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" name="fechaFin" id="fechaFin">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">error seleccione fecha</p>
      </div>

      <!-- Grupo: Telefono alumno-->
      <div class="formulario__grupo" id="grupo__telefonoAlumno">
        <label for="telefonoAlumno" class="formulario__label">Teléfono alumno:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="telefonoAlumno" id="telefonoAlumno" placeholder="EJ: 7771234567">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
      </div>

      <!-- Grupo: Sexo -->
      <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">Sexo:</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="Hombre" selected>Hombre</option>            
                        <option value="Mujer">Mujer</option>
                        <option value="Heterosexual">Heterosexual</option>            
                        <option value="Bisexual">Bisexual</option>
                        <option value="Transformistas">Transformistas</option>            
                        <option value="Pansexual">Pansexual</option>
                        <option value="Asexual">Asexual</option>
                        <option value="Trans">Trans</option>
                        <option value="Transexual">Transexual</option>
                        <option value="Trasvesti">Trasvesti</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Proceso -->
      <div class="formulario_grupo" id="grupo_proceso">
        <label for="proceso" class="formulario__label">Proceso:</label>
        <div class="formulario__grupo-input">
                    <select name="proceso" class="formulario__input" id="proceso">
                        <option value="Servicio social" selected>Servicio social</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Programa educativo -->
      <div class="formulario_grupo" id="grupo_idPrograma">
        <label for="idPrograma" class="formulario__label">Programa educativo:</label>
        <div class="formulario__grupo-input">
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
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: Cuatrimestre -->
      <div class="formulario_grupo" id="grupo_cuatrimestre">
        <label for="cuatrimestre" class="formulario__label">Cuatrimestre:</label>
        <div class="formulario__grupo-input">
                    <select name="cuatrimestre" class="formulario__input" id="cuatrimestre">
                        <option value="1" selected>1 cuatrimestre</option>            
                        <option value="2">2 cuatrimestre</option>
                        <option value="3">3 cuatrimestre</option>            
                        <option value="4">4 cuatrimestre</option>
                        <option value="5">5 cuatrimestre</option>
                        <option value="6">6 cuatrimestre</option>            
                        <option value="7">7 cuatrimestre</option>
                        <option value="8">8 cuatrimestre</option>            
                        <option value="9">9 cuatrimestre</option>
                        <option value="10">10 cuatrimestre</option>
                        <option value="11">11 cuatrimestre</option>
                        <option value="12">12 cuatrimestre</option>            
                        <option value="13">13 cuatrimestre</option>
                        <option value="14">14 cuatrimestre</option>            
                        <option value="15">15 cuatrimestre</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Grupo -->
      <div class="formulario_grupo" id="grupo_grupo">
        <label for="grupo" class="formulario__label">Grupo:</label>
        <div class="formulario__grupo-input">
                    <select name="grupo" class="formulario__input" id="grupo">
                        <option value="A" selected>A</option>            
                        <option value="B">B</option>
                        <option value="C">C</option>            
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Generacion -->
      <div class="formulario__grupo" id="grupo__generacion">
        <label for="generacion" class="formulario__label">Ingrese generación</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="generacion" id="generacion" placeholder="EJ: 2018-2021">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Ingrese correctamente EJ: 2018-2022</p>
      </div>

      <!-- Grupo: matricula profesor-->
      <div class="formulario__grupo" id="grupo__matriculaProfesor">
        <label for="matriculaProfesor" class="formulario__label"></label>
        <div class="formulario__grupo-input">
          <input type="hidden" class="formulario__input" name="matriculaProfesor" id="matriculaProfesor"value="<?php echo $_SESSION['matriculaProfesor'] ?>" readonly="">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">ingrese</p>
      </div>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="regAlumno()">Enviar</button>
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