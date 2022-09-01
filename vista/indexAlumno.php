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

  $consulta="SELECT * FROM altalumno WHERE matriculaAlumno='$ma'";
  $query5=mysqli_query($mysqli,$consulta);
  $row5=mysqli_fetch_array($query5);
  $idA = $row5['idAlta'];

  //$DateAndTime = date('m-l-Y', time());  
  //echo "Jiutepec, Morelos a  $DateAndTime.";

  $sqlAlumno   = ("SELECT * FROM imagenes WHERE estado = '1' AND lugarImg = 'Noticias'"); 
  $queryAlumno = mysqli_query($mysqli, $sqlAlumno);
  $queryNot = mysqli_query($mysqli, $sqlAlumno);

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
    <link rel="stylesheet" href="../vista/style/estilos1.css" />

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
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

    <h1 class="font-weight-bold mb-4 text-center">Sistema web servicio social UPEMOR</h1>
    <!-- Optional JavaScript; choose one of the two! -->
    <section>
      <div class="row g-5 container-fluid">
        <div class="px-lg-5">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <?php 
                $i=0;
                foreach($queryNot as $row){
                    $actives = '';
                    if ($i==0) {
                        $actives='active';
                    }
                ?> 
              <div class="carousel-item min-vh-100 <?= $actives; ?>" style="background-image: url('<?php echo $row['foto']; ?>')">
                <!--<img src="imagenes/upemor-1.jpg" width="1100" height="700" class="d-md-block w-100"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5 style="color: #0C0B0A">Servicio social</h5>
                  <p style="color: #0C0B0A"><b><?php echo $row['descripcion']; ?></b></p>
                </div>
              </div>
              <?php $i++;}?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
    </section>
    <br>
    <br>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>

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
                    <a href="https://www.facebook.com/upemoroficial/" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/upemoroficial/" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/Upemoroficial" class="fa fa-twitter"></a>
                    <a href="https://www.youtube.com/user/CanalUPEMOR" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>Aslin Emilio Lopez Mancillas</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>


</html>