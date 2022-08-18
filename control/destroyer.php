<?php
	session_start();
	session_destroy();
	header("Location: ../vista/Login.php");
	
?>