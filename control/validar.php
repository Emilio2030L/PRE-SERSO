<?php
	session_start(); //Validaciones de los inicios de sesión de los roles de profesor, alumno o administrador
	require("../conexion/connect_db.php");
	$username=$_POST['correo'];
	$pass=$_POST['contrase'];
	//confirmar usuario alumno
	$sql=mysqli_query($mysqli,"SELECT * FROM alumnos WHERE correAlumno='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['passwordAlumno']){
			$_SESSION['matriculaAlumno']=$f['matriculaAlumno'];
			$_SESSION['nombreAlumno']=$f['nombreAlumno'];
			$_SESSION['rol']=$f['rol'];
			header("Location: ../vista/indexAlumno.php");
		}else{
			$sql=mysqli_query($mysqli,"SELECT * FROM alumnos WHERE correAlumno='$username'");
			$nr = mysqli_num_rows($sql);
			$buscarpass = mysqli_fetch_array($sql);
			if (($nr == 1) && (password_verify($pass, $buscarpass['passwordAlumno']))) {
				$_SESSION['matriculaAlumno']=$f['matriculaAlumno'];
				$_SESSION['nombreAlumno']=$f['nombreAlumno'];
				$_SESSION['rol']=$f['rol'];
			header("Location: ../vista/indexAlumno.php");
			}else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='../vista/Login.php'</script>";
		}
	}
	}else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='../vista/Login.php'</script>";	
	}

	//confirmar usuario profesor

	$sql=mysqli_query($mysqli,"SELECT * FROM profesores WHERE correProfesor='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['passwordProfesor']){
			$_SESSION['matriculaProfesor']=$f['matriculaProfesor'];
			$_SESSION['nombreProfesor']=$f['nombreProfesor'];
			$_SESSION['rol']=$f['rol'];
			header("Location: ../vista/indexDocente.php");
		}else{
			$sql=mysqli_query($mysqli,"SELECT * FROM profesores WHERE correProfesor='$username'");
			$nr = mysqli_num_rows($sql);
			$buscarpass = mysqli_fetch_array($sql);
			if (($nr == 1) && (password_verify($pass, $buscarpass['passwordProfesor']))) {
				$_SESSION['matriculaProfesor']=$f['matriculaProfesor'];
				$_SESSION['nombreProfesor']=$f['nombreProfesor'];
				$_SESSION['rol']=$f['rol'];
				header("Location: ../vista/indexDocente.php");
			}else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='../vista/Login.php'</script>";
		}
	}
	}else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='../vista/Login.php'</script>";	
	}

	//confirma usuario administrador

	$sql=mysqli_query($mysqli,"SELECT * FROM administrador WHERE correoAdmin='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['passwordAdmin']){
			$_SESSION['NombreUsuario']=$f['NombreUsuario'];
			$_SESSION['rol']=$f['rol'];
			header("Location: ../vista/indexAdmin.php");
		}else{
			$sql=mysqli_query($mysqli,"SELECT * FROM administrador WHERE correoAdmin='$username'");
			$nr = mysqli_num_rows($sql);
			$buscarpass = mysqli_fetch_array($sql);
			if (($nr == 1) && (password_verify($pass, $buscarpass['passwordAdmin']))) {
				$_SESSION['NombreUsuario']=$f['NombreUsuario'];
				$_SESSION['rol']=$f['rol'];
				header("Location: ../vista/indexAdmin.php");
			}else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='../vista/Login.php'</script>";
		}
	}
	}else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='../vista/Login.php'</script>";	
	}

?>