<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Usuario o contraseña invalidos";
	}
	else
	{
		// Define $username y $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Estableciendo la conexion a la base de datos
		include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
		include("config/conexion.php");//Contiene de conexion a la base de datos

		// Para proteger de Inyecciones SQL
		$username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
		$password =  md5($password);//Algoritmo de encriptacion de la contraseña

		$sql = "SELECT user, password FROM login WHERE user = '" . $username . "' and password='".$password."';";
		$query=mysqli_query($con,$sql);
		$counter=mysqli_num_rows($query);
		if ($counter==1){

			$_SESSION['login_user_sys']=$username;
			header("location: administracion.php"); // Redireccionando a la pagina administracion.php

			exit();
		} else {
			$error = "El Usuario o la contraseña es inválida.";
		}
	}
}
?>
