<?php
$resulta ='';
if(isset($_POST['submit'])){
  //   $date = mysql_real_escape_string($_POST['date']);
  // $new_date = date('Y-m-d',strtotime($date));
  $id_impresora	= mysql_real_escape_string($_POST['myselectbox']);
  $fecha	= date(mysqli_real_escape_string($conn,(strip_tags($_POST['fecha'], ENT_QUOTES))));
  $impresiones  	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['n_impresion'], ENT_QUOTES))));
  $copias  	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['n_copia'], ENT_QUOTES))));
  if (empty($id_impresora)) {
    $resulta= '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Debe elegir una impresora</div>';
  }else {
    $sql = "INSERT INTO impr_copias (id_impresora,fecha,impresion,copia) VALUES('$id_impresora','$fecha','$impresiones','$copias')";
    //consulta para insertar datos
    $insert = mysqli_query($conn, $sql) or die(mysqli_error());
    if(!$insert){
      $resulta= '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
    }else{
      echo "<script>alert('Los datos han sido agregados correctamente.'); window.location = 'impresoras.php'</script>";

      // header("Location: impresoras.php");

    }
  }
}
if(isset($_POST['submit2'])){
  $lugar_imp	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['lugar_imp'], ENT_QUOTES))));
  $nombre_imp	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['nombre_imp'], ENT_QUOTES))));
  $cant_imp  	=  intval($_POST['cant_imp']);
  $ip_imp 		= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['ip_imp'], ENT_QUOTES))));
  $n_serie  = trim(mysqli_real_escape_string($conn,(strip_tags($_POST['n_serie'], ENT_QUOTES))));
  if (empty($nombre_imp)) {
    $resulta= '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El campo <strong>NOMBRE</strong> no puede quedar vacio</div>';
  }else {
    $consulta="SELECT nombre_imp FROM impresora_contador WHERE nombre_imp='$nombre_imp'";
    $resultado=mysqli_query($conn,$consulta) or die (mysqli_error());
    if (mysqli_num_rows($resultado)>0)
    {
      $resulta= '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ya existe una impresora con ese registro.</div>';
    }else {
      //consulta para insertar datos
      $insert = mysqli_query($conn, "INSERT INTO impresora_contador(lugar_imp,nombre_imp,cant_imp,ip_imp, n_serie)
      VALUES('$lugar_imp','$nombre_imp', '$cant_imp', '$ip_imp', '$n_serie')") or die(mysqli_error());
      if(!$insert){
        $resulta= '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
      }else{
        $resulta= '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido agregados correctamente.</div>';
      }
    }
  }
}



?>
