<?php
// include('login.php'); // Includes el sript de login

require_once 'controller/login.php';

if(isset($_SESSION['login_user_sys'])){
  header("location: administracion.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <?php include("vista/head.php");?>

<script>
// funcion para saber si la tecla Mayus esta activa
function capLock(e){
  var kc = e.keyCode ? e.keyCode : e.which;
  var sk = e.shiftKey ? e.shiftKey : kc === 16;
  var visibility = ((kc >= 65 && kc <= 90) && !sk) ||
      ((kc >= 97 && kc <= 122) && sk) ? 'visible' : 'hidden';
  document.getElementById('divMayus').style.visibility = visibility
}
</script>
</head>

<body>
  

  <div class="container">  <!--Div principal va a contener a todos los demas en una clase contenedora-->
    <h1>Login Inventario</h1>
    <form class="form-horizontal" action="#" method="post" > <!--ejecuta los div que se encuentran dentro del form por medio del metodo 'post' solicitando datos-->
      <div class="form-group"> <!--separa a los Div por grupos-->
        <label for="inputusername" class="col-sm-2 control-label">Usuario</label> <!--Label que muestra el nombre del campo solicitado-->
        <div class="col-sm-6">
          <input type="text" class="form-control" name="username" id="inputusername" placeholder="usuario" required onkeypress="capLock(event)"> <!--Caja de texto donde se solicita el usuario-->
        </div>
      </div>
      <div class="form-group">
        <label for="inputcontraseña" class="col-sm-2 control-label">Contraseña</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="password" id="inputcontraseña" placeholder="contraseña" required onkeypress="capLock(event)">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input name="submit" type="submit" value="Ingresar" class="btn btn-primary btn-success">
        </div>
      </div>
      <div class="clear"> </div>

      <span class="col-sm-10"><?php echo $error; ?></span>
      <div class="alert alert-warning col-sm-10" id="divMayus" style="visibility:hidden">Bloq Mayus activa</div>
  </form>
</div>

</body>
</html>
