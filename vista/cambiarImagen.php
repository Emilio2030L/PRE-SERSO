<?php 
    include("../conexion/connect_db.php");
    session_start();
    if (@!$_SESSION['NombreUsuario']) {
      header("Location:../vista/Login.php");
    }elseif ($_SESSION['rol']!=1) {
      header("Location:../vista/indexAdmin.php");
    }
    $sql2="SELECT * FROM imagenes";
    $query2=mysqli_query($mysqli,$sql2);

    $id=$_GET['id'];

    $sql="SELECT * FROM imagenes WHERE idImg='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);

    $resultAll = mysqli_query($mysqli," SELECT foto FROM imagenes WHERE estado = '1' && lugarImg = 'Logotipo' ORDER BY idImg DESC LIMIT 1; "); 
    $rowData = mysqli_fetch_array($resultAll);
?>

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
    <section>
      
    </section>
    <section>
      <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>
          <div class="container mt-4">
                    <div class="row"> 
                        <div class="col-md-4">
                            <h1 class="text-dark">Ingrese datos</h1>
                            <br>
                                <form action="../control/cambiarLogo.php" method="post" enctype="multipart/form-data" >
                                  <input type="hidden" name="cod" value="<?php echo $row['idImg']  ?>">
                                  <p class="text-dark">Id del registro :<?php echo $row['idImg']  ?></p>
                                  <label class="text-dark">Agrega una descripción</label>
                                  <br>
                                  <br>
                                  <textarea name="descripcion" rows="5" cols="40"><?php echo $row['descripcion']  ?></textarea>
                                  <br>
                                  <br>
                                  <select name="lug">
                                      <option value="<?php echo $row['lugarImg']  ?>"><?php echo $row['lugarImg']  ?></option>
                                      <option value="Logotipo">Logotipo</option>
                                      <option value="Inicio">Inicio</option>
                                      <option value="Noticias">Noticias</option> 
                                  </select>
                                  <select name="activ">

                                    <option value="<?php echo $row['estado']  ?>">
                                      <?php if ($row['estado'] == 1) { ?>
                                        Activa</option>
                                        <option value="0">Inactiva</option>
                                      <?php } ?>

                                      <?php if ($row['estado'] == 0) { ?>
                                        Inactiva</option>
                                        <option value="1">Activa</option>
                                      <?php } ?>

                                  </select>
                                  <br>
                                  <br>
                                  <button type="submit" class="btn btn-primary w-30">Actualizar registro</button>
                                  <br>
                                  <br>
                                </form>
                        </div>
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Descripcion</th>
                                        <th>Lugar</th>
                                        <th>Estado</th>
                                        <th>URL imagen</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query2)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['idImg']?></th>
                                                <th><?php  echo $row['descripcion']?></th>
                                                <th><?php  echo $row['lugarImg']?></th>
                                                <th><?php  echo $row['estado']?></th>
                                                <th><?php  echo $row['foto']?></th> 
                                                <th><a href="cambiarImagen.php?id=<?php echo $row['idImg'] ?>" class="btn btn-info">Editar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
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