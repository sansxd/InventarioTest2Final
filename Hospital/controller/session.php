<?php
// Estableciendo la conexion a la base de datos
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_user_sys'];
// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($con, "SELECT user from login where user='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['user'];
if(!isset($login_session)){
mysqli_close($con); // Cerrando la conexion
header('Location: index.php'); // Redirecciona a la pagina de inicio
}

// if (!isset($_SESSION['tiempo'])) {
//     $_SESSION['tiempo']=time();
// }
// else if (time() - $_SESSION['tiempo'] > 1300) {
//    session_unset();
//     session_destroy();
//     /* Aquí redireccionas a la url especifica */
//     header("Location: index.php");
//     die();
// }
//Expire the session if user is inactive for 30
//minutes or more.
$expireAfter = 20;

//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){

    //averigua cuantos segundos han pasado
    //desde que el usuario estuvo por ultima vez
    $secondsInactive = time() - $_SESSION['last_action'];
    //convierte minutos en segundos
    $expireAfterSeconds = $expireAfter * 60;
    //verifica si han estado inactivos durante demasiado tiempo.
    if($secondsInactive >= $expireAfterSeconds){
        //si el usuario ha estado inactivo por mucho tiempo.
        //mata la session.
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}
// asigna la marca de tiempo actual como la última actividad del usuario
$_SESSION['last_action'] = time();


?>
