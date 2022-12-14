<!doctype html>
<?php
  require("../conexion/connect_db.php");
  $sqlAlumno   = ("SELECT * FROM imagenes WHERE estado = '1' AND lugarImg = 'Inicio'"); 
  $queryAlumno = mysqli_query($mysqli, $sqlAlumno);
  $queryNot = mysqli_query($mysqli, $sqlAlumno);

  $resultAll3 = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; ");
  $rowData3 = mysqli_fetch_array($resultAll3);
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
                  <h3><b><?php echo $row['descripcion']; ?></b></h3>
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
        <div class="col-lg-5">
          <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4">
            <img src="<?php echo $rowData3['foto']; ?>" class="img-fluid" width="170">
          </div>
          <div class="px-lg-5 py-lg-4 p-4">
            <h1 class="text-light font-weight-bold mb-4" >Servicio social Upemor</h1>
            <!--Aqui comienza el formulario -->
              <form class="mb-5" action="../control/validar.php" method="post">
                <div class="mb-4">
                  <label for="exampleInputEmail1" class="text-light form-label font-weight-bold">Correo electr??nico</label>
                  <input type="email" class="form-control bg-dark-x border-0" placeholder="Ingresa tu correo electr??nico" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="text-light form-label font-weight-bold">Contrase??a </label>
                  <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contrase??a" id="exampleInputPassword1" name="contrase">
                  <!--<a href="indexAdmin.html" id="emailHelp" class="text-light form-text text-decoration-none">??Olvidaste tu contrase??a?.</a>-->
                </div>
                <input type="submit" class="btn btn-primary w-100" name="btnLog" value = "Iniciar sesi??n">
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