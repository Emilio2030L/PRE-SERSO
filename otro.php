<!doctype html>
<?php
  require("../conexion/connect_db.php");
  $resultAll = mysqli_query($mysqli,"SELECT foto FROM categorias WHERE id_categoria='1'");

  $rowData = mysqli_fetch_array($resultAll);
  echo ($rowData['foto']);

  /*if(!$resultAll){
    die(mysqli_error($dbcon));
  }

  if (mysqli_num_rows($resultAll) > 0) {
    while($rowData = mysqli_fetch_array($resultAll)){
        echo ($rowData['foto']);
    }
  }
  echo '<img src="'.$rowData['foto'].'"> ';*/
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css" />
    <script src="https://kit.fontawesome.com/a2e90db0c2.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">

    <title>Upemor servicio social</title>
  </head>
  <body class="bg-dark">
    <section> 
      <div class="row g-0">
        <div class="col-lg-7">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators"> 
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item min-vh-100 active" style="background-image: url('imagenes/upemor-1.jpg');">
                <!--<img src="imagenes/upemor-1.jpg" width="1100" height="700" class="d-md-block w-100"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item min-vh-100" style="background-image: url('imagenes/upemor_2.jpg');">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item min-vh-100" style="background-image: url('imagenes/upemor.jpg');">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <div class="col-lg-5">
          <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4">
            <img src="imagenes/images.png" class="img-fluid">
          </div>
          <div class="px-lg-5 py-lg-4 p-4">
            <h1 class="font-weight-bold mb-4">Servicio social Upemor</h1>
            <!--Aqui comienza el formulario -->
              <form class="mb-5" action="validar.php" method="post">
                <div class="mb-4">
                  <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo electrónico</label>
                  <input type="email" class="form-control bg-dark-x border-0" placeholder="Ingresa tu correo electrónico" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña </label>
                  <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1" name="contrase">
                  <a href="indexAdmin.html" id="emailHelp" class="form-text text-decoration-none">¿Olvidaste tu contraseña?.</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>
            <!--<p class="font-weight-bold text-center text-muted">Redes sociales</p>
            <div class="d-flex justify-content-around">
              <button type="submit" class="btn btn-outline-light flex-grow-1 mr-1"><i class="fa-brands fa-facebook lead mr-2"></i>Facebook</button>
              <button type="submit" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fa-brands fa-instagram-square lead mr-2"></i>Instragram</button> -->
            </div>
          </div>
        </div>  
      </div>

    </section>

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

<div class="carousel-item min-vh-100 active" style="background-image: url('<?php echo $rowData['foto']; ?>');">




  <div class="row">
            <div class="span12">
              <div class="caption">
              <h2> Administración de Profesores Registrados</h2>  
              <div class="well well-small">
              <hr class="soft"/>
              <h4>Tabla de Profesores</h4>
              <div class="row-fluid">
                <?php
                  require("../conexion/connect_db.php");
                  $sql=("SELECT * FROM imagenes");//Impresión de los profesores registrados en el sistema
                  $query=mysqli_query($mysqli,$sql);
                  echo "<table border='1'; class='table table-hover';>";
                    echo "<tr class='warning'>";
                      echo "<td>Id</td>";
                      echo "<td>Desc</td>";
                      echo "<td>URL</td>";
                      echo "<td>Editar</td>";
                      echo "<td>Borrar</td>";
                    echo "</tr>"; 
                ?>  
                <?php 
                   while($arreglo=mysqli_fetch_array($query)){
                      echo "<tr class='success'>";
                        echo "<td>$arreglo[0]</td>";
                        echo "<td>$arreglo[1]</td>";
                        echo "<td>$arreglo[2]</td>";
                        echo "<td><a href='actualizarprofesor.php?id=$arreglo[0]'><img src='../vista/imagenes/actualizar.gif' class='img-rounded'></td>";//Metodos para eliminar y editar
                      echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='../vista/imagenes/eliminar.png' class='img-rounded'/></a></td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                    extract($_GET);
                    if(@$idborrar==2){
                      $sqlborrar="DELETE FROM profesores WHERE Idprofesores=$id";
                      $resborrar=mysqli_query($mysqli,$sqlborrar);
                      echo '<script>alert("REGISTRO ELIMINADO")</script> ';
                      echo "<script>location.href='admin.php'</script>";
                    }
                ?>
                <div class="span8"></div> 
                </div>  
                <br/>
              </div>
              </div>
            </div>
          </div>





          <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/estilos.css" />


    <title>Hello, world!</title>
  </head>
  <body class="bg-dark-y">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="imagenes/images.png" alt="logo" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Docente</a></li>
                <li><a class="dropdown-item" href="#">Institución</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="agregarLogo.php">Agregar logo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Base de datos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Respaldo</a></li>
                <li><a class="dropdown-item" href="#">Restauración</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../control/destroyer.php">Cerrar sesión</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <section>
      <div class="px-lg-3 py-lg-3 p-4">
        <h1 class="text-dark">Registro</h1>
      </div>
      <div class="px-lg-5 py-lg-1 p-4">
      <form action="../control/agregarImagen.php" method="post" enctype="multipart/form-data" >
        <label class="text-dark">Agrega una descripcion</label>
        <textarea name="desc" rows="5" cols="50" placeholder="Describe la imagen"></textarea>
        <br>
        <input class="btn-primary"  type="file" name="foto"><br><br>
        <button type="submit" class="btn btn-primary w-30">Registrar</button>
      </form>
      </div>
    </section>
    <section>
          <div class="row">
            <div class="span12">
              <div class="caption">
              <h2> Administración de Profesores Registrados</h2>  
              <div class="well well-small">
              <hr class="soft"/>
              <h4>Tabla de Profesores</h4>
              <div class="row-fluid">
                <?php
                  require("../conexion/connect_db.php");
                  $sql=("SELECT * FROM imagenes");//Impresión de los profesores registrados en el sistema
                  $query=mysqli_query($mysqli,$sql);
                  echo "<table border='1'; class='table table-hover';>";
                    echo "<tr class='warning'>";
                      echo "<td>Id</td>";
                      echo "<td>Desc</td>";
                      echo "<td>URL</td>";
                      echo "<td>Editar</td>";
                    echo "</tr>"; 
                ?>  
                <?php 
                   while($arreglo=mysqli_fetch_array($query)){
                      echo "<tr class='success'>";
                        echo "<td>$arreglo[0]</td>";
                        echo "<td>$arreglo[1]</td>";
                        echo "<td>$arreglo[2]</td>";
                        echo "<td><a href='modificiarImagen.php?id=$arreglo[0]'><img src='../vista/imagenes/actualizar.gif' class='img-rounded'></td>";//Metodos para eliminar y editar
                    echo "</tr>";
                  }
                ?>
                <div class="span8"></div> 
                </div>  
                <br/>
              </div>
              </div>
            </div>
          </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>



<?php 
    include("../conexion/connect_db.php");

$id=$_GET['id'];

$sql="SELECT * FROM imagenes WHERE idImg='$id'";
$query=mysqli_query($mysqli,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="../control/cambiarLogo.php" method="post"  >
                                <input type="hidden" name="cod_estudiante" value="<?php echo $row['idImg']  ?>">
                                <label class="text-dark">Agrega una descripcion</label>
                                <input type="text" name="descripcion" value="<?php echo $row['descripcion']  ?>">
                                <select name="lug">
                                      <option value="logotipo">Logotipo</option>
                                      <option value="Primera">Primera</option>
                                      <option value="Segunda">Segunda</option>
                                      <option value="Tercera">Tercera</option>
                                  </select>
                                  <select name="activ">
                                      <option value="1">Activa</option>
                                      <option value="0">Inactiva</option>
                                  </select>
                                <button type="submit" class="btn btn-primary w-30">Registrar</button>
                    </form>
                    
                </div>
    </body>
</html>

/*                    */

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
                <li><a class="dropdown-item" href="../vista/regstroDocente.php">Docente</a></li>
                <li><a class="dropdown-item" href="#">Institución</a></li>
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
                <li><a class="dropdown-item" href="#">Respaldo</a></li>
                <li><a class="dropdown-item" href="#">Restauración</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../control/destroyer.php">Cerrar sesión</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <h1 class="text-dark text-center">Registro docentes</h1>

    <main>
    <form action="" class="formulario" id="formulario">
      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__usuario">
        <label for="nombre" class="formulario__label">Nombre alumno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="EJ: Eliel">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__paterno">
        <label for="paterno" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="paterno" id="paterno" placeholder="EJ: Gonzalez">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido P tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__materno">
        <label for="materno" class="formulario__label">Apellido Materno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="materno" id="materno" placeholder="EJ: Velazquez">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Sexo -->
      <div class="formulario_grupo" id="grupo_SexoEmp">
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
        <p class="formulario__input-error">Selecciona un genero.</p>
      </div>

      <!-- Grupo: Puesto -->
      <div class="formulario_grupo" id="grupo_puesto">
        <label for="puesto" class="formulario__label">Puesto:</label>
        <div class="formulario__grupo-input">
                    <select name="puesto" class="formulario__input" id="puesto">
                        <option value="Profesor de tiempo completo" selected>Profesor de tiempo completo</option>            
                        <option value="Profesor por asignatura">Profesor por asignatura</option>
                        <option value="Otro">Otro</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un genero.</p>
      </div>

      <!-- Grupo: Fecha Naciemiento -->
      <div class="formulario__grupo" id="grupo__fechaNac">
        <label for="fechaNac" class="formulario__label">Fecha Naciemiento</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" name="fechaNac" id="fechaNac">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Unidad -->
      <div class="formulario_grupo" id="grupo_unidad">
        <label for="unidad" class="formulario__label">Unidad:</label>
        <div class="formulario__grupo-input">
                    <select name="unidad" class="formulario__input" id="unidad">
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
        <p class="formulario__input-error">Selecciona un genero.</p>
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

  <script src="../vista/js/formulario.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>






<!--Registro actividades-->


<!doctype html>
<?php
  session_start();
  if (@!$_SESSION['nombreAlumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }

  $nom = $_SESSION['nombreAlumno'];

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
          <img src="../vista/imagenes/images.png" alt="logo" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/indexAlumno.php">Alumno</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Generar
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/cartaAceptacion.php">Carta aceptación</a></li>
                <li><a class="dropdown-item" href="../vista/cartaLiberacion.php">Carta liberación</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Evaluaciónes</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Avance de actividades</a></li>
                <li><a class="dropdown-item" href="../vista/registroActividad.php">Registro de actividades</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../control/destroyer.php">Cerrar sesión</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <h1 class="text-dark text-center">Registro actividades</h1>

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














































<?php
  session_start(); //Validaciones de los inicios de sesión de los roles de profesor, alumno o administrador
  require("../conexion/connect_db.php");
  $username=$_POST['correo'];
  $pass=$_POST['contrase'];
  $sql=mysqli_query($mysqli,"SELECT * FROM administrador WHERE correoAdmin='$username'");
  if($f2=mysqli_fetch_assoc($sql)){
    if($pass==$f2['passwordAdmin']){
      $_SESSION['idAdmin']=$f2['idAdmin'];
      $_SESSION['NombreUsuario']=$f2['NombreUsuario'];
      $_SESSION['rol']=$f2['rol'];
      echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
      echo "<script>location.href='../vista/indexAdmin.php'</script>";
    }
  }//Validaciones de los inicios de sesión de los roles de profesor, alumno o administrador
  $sql=mysqli_query($mysqli,"SELECT * FROM alumnos WHERE correAlumno='$username'");
  if($f=mysqli_fetch_assoc($sql)){
    if($pass==$f['passwordAlumno']){
      $_SESSION['matriculaAlumno']=$f['matriculaAlumno'];
      $_SESSION['nombreAlumno']=$f['nombreAlumno'];
      $_SESSION['rol']=$f['rol'];
      header("Location: ../vista/indexAlumno.php");
    }else{
      echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
      echo "<script>location.href='../vista/Login.php'</script>";
    }
  }else{
    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='../vista/Login.php'</script>"; 
  }//Validaciones de los inicios de sesión de los roles de profesor, alumno o administrador
  $sql=mysqli_query($mysqli,"SELECT * FROM profesores WHERE correProfesor='$username'");
  if($f=mysqli_fetch_assoc($sql)){
    if($pass==$f['passwordProfesor']){
      $_SESSION['matriculaProfesor']=$f['matriculaProfesor'];
      $_SESSION['nombreProfesor']=$f['nombreProfesor'];
      $_SESSION['rol']=$f['rol'];
      header("Location: ../vista/indexDocente.php");
    }else{
      echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
      echo "<script>location.href='../vista/Login.php'</script>";
    }
  }else{
    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='../vista/Login.php'</script>"; 
  }


  if (isset($_POST['btnLog'])) {
  $bus1 = mysqli_query($mysqli,"SELECT * FROM alumnos WHERE correAlumno='$username'");
  $nr = mysqli_num_rows($bus1);
  $buscarPass = mysqli_fetch_array($bus1);

    if (($nr == 1)&&(password_verify($pass, $buscarPass['passwordAlumno']))) {
      echo "BIENVENIDO ALUMNO";
    }else {
      echo '<script>alert("Error de correo o password");
      window.location.href = "../vista/login.php";
      </script> ';
    }

  } 



  
?>














<!doctype html>
<?php
  require("../conexion/connect_db.php");
  $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Primera' ORDER BY idImg DESC LIMIT 1; ");
  $resultAll1 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Segunda' ORDER BY idImg DESC LIMIT 1; ");
  $resultAll2 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Tercera' ORDER BY idImg DESC LIMIT 1; ");
  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");

  $rowData = mysqli_fetch_array($resultAll);
  /*echo ($rowData['foto']);*/

  $rowData1 = mysqli_fetch_array($resultAll1);
  /*echo ($rowData1['foto']);*/

  $rowData2 = mysqli_fetch_array($resultAll2);
  /*echo ($rowData2['foto']);*/

  $rowData3 = mysqli_fetch_array($resultAll3);
  /*echo ($rowData1['foto']);*/

  /*if(!$resultAll){
    die(mysqli_error($dbcon));
  }

  if (mysqli_num_rows($resultAll) > 0) {
    while($rowData = mysqli_fetch_array($resultAll)){
        echo ($rowData['foto']);
    }
  }
  echo '<img src="'.$rowData['foto'].'"> ';*/
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/estilos.css" />
    <script src="https://kit.fontawesome.com/a2e90db0c2.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">

    <title>Upemor servicio social</title>
  </head>
  <body class="bg-dark">
    <section> 
      <div class="row g-0">
        <div class="col-lg-7">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators"> 
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item min-vh-100 active" style="background-image: url('<?php echo $rowData['foto']; ?>');">
                <!--<img src="imagenes/upemor-1.jpg" width="1100" height="700" class="d-md-block w-100"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item min-vh-100" style="background-image: url('<?php echo $rowData1['foto']; ?>');">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item min-vh-100" style="background-image: url('<?php echo $rowData2['foto']; ?>');">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <div class="col-lg-5">
          <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4">
            <img src="<?php echo $rowData3['foto']; ?>" class="img-fluid" width="170">
          </div>
          <div class="px-lg-5 py-lg-4 p-4">
            <h1 class="text-light font-weight-bold mb-4" >Servicio social Upemor</h1>
            <!--Aqui comienza el formulario -->
              <form class="mb-5" action="../control/validar.php" method="post">
                <div class="mb-4">
                  <label for="exampleInputEmail1" class="text-light form-label font-weight-bold">Correo electrónico</label>
                  <input type="email" class="form-control bg-dark-x border-0" placeholder="Ingresa tu correo electrónico" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="text-light form-label font-weight-bold">Contraseña </label>
                  <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1" name="contrase">
                  <a href="indexAdmin.html" id="emailHelp" class="text-light form-text text-decoration-none">¿Olvidaste tu contraseña?.</a>
                </div>
                <input type="submit" class="btn btn-primary w-100" name="btnLog" value = "Iniciar sesión">
            </form>
            <!--<p class="font-weight-bold text-center text-muted">Redes sociales</p>
            <div class="d-flex justify-content-around">
              <button type="submit" class="btn btn-outline-light flex-grow-1 mr-1"><i class="fa-brands fa-facebook lead mr-2"></i>Facebook</button>
              <button type="submit" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fa-brands fa-instagram-square lead mr-2"></i>Instragram</button> -->
            </div>
          </div>
        </div>  
      </div>

    </section>

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