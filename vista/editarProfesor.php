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


  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM profesores WHERE matriculaProfesor='$id'";
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
              <a class="nav-link active" aria-current="page" href="../vista/indexAdmin.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/registroDocente.php">Docente</a></li>
                <li><a class="dropdown-item" href="../vista/registroUnidad.php">Institución</a></li>
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

    <h1 class="font-weight-bold mb-4 text-center p-4">Editar profesor</h1>

    
    <main>
    <form class="formulario" id="formulario">
      <!-- Grupo: Matricula Profesor  -->
      <div class="formulario__grupo" id="grupo__matriculaProfesor">
        <label for="matriculaProfesor" class="formulario__label">Matricula profesor</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="matriculaProfesor" id="matriculaProfesor" value="<?php echo $row['matriculaProfesor']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>


      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreProfesor">
        <label for="nombreProfesor" class="formulario__label">Nombre docente</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreProfesor" id="nombreProfesor" value="<?php echo $row['nombreProfesor']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__apellidoPaterno">
        <label for="apellidoPaterno" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoPaterno" id="apellidoPaterno" value="<?php echo $row['apellidoPaterno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__apellidoMmaterno">
        <label for="apellidoMmaterno" class="formulario__label">Apellido Materno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoMmaterno" id="apellidoMmaterno" value="<?php echo $row['apellidoMmaterno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Sexo -->
      <div class="formulario_grupo" id="grupo_generoProfesor">
        <label for="generoProfesor" class="formulario__label">Sexo:</label>
        <div class="formulario__grupo-input">
                    <select name="generoProfesor" class="formulario__input" id="generoProfesor">
                        <option value="<?php echo $row['generoProfesor']  ?>" selected><?php echo $row['generoProfesor']  ?></option> 
                        <option value="Hombre">Hombre</option>            
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
        <p class="formulario__input-error">Selecciona un genero.</p>
      </div>

      <!-- Grupo: Puesto -->
      <div class="formulario_grupo" id="grupo_puesto">
        <label for="puestoProfesor" class="formulario__label">Puesto:</label>
        <div class="formulario__grupo-input">
                    <select name="puestoProfesor" class="formulario__input" id="puestoProfesor">
                        <option value="<?php echo $row['puestoProfesor']  ?>" selected><?php echo $row['puestoProfesor']  ?></option>
                        <option value="Profesor de tiempo completo" >Profesor de tiempo completo</option>            
                        <option value="Profesor por asignatura">Profesor por asignatura</option>
                        <option value="Otro">Otro</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un genero.</p>
      </div>

      <!-- Grupo: Fecha Naciemiento -->
      <div class="formulario__grupo" id="grupo__fechaNacProfesor">
        <label for="fechaNacProfesor" class="formulario__label">Fecha Nacimiento</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" name="fechaNacProfesor" id="fechaNacProfesor" value="<?php echo $row['fechaNacProfesor']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">error seleccione fecha</p>
      </div>

      <!-- Grupo: Unidad -->
      <div class="formulario_grupo" id="grupo_idUnidad">
        <label for="idUnidad" class="formulario__label">Unidad:</label>
        <div class="formulario__grupo-input">
                    <select name="idUnidad" class="formulario__input" id="idUnidad">
                      <option value="<?php echo $row['idUnidad']  ?>" selected><?php echo $row['idUnidad']  ?></option>
                        <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT * FROM unidadreceptora";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                          $id=$row['idUnidad'];
                          $nombre=$row['nombreUnidad'];
                        
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

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="actProfe()">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formulario.js"></script>
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