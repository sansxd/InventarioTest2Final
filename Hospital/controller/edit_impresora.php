<?php
require_once '../config/conn.php';
if(isset($_POST['update'])){
	$id			= intval($_POST['id']);
	$lugar_imp	= mysqli_real_escape_string($conn,(strip_tags($_POST['lugar_imp'], ENT_QUOTES)));
	$nombre_imp	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre_imp'], ENT_QUOTES)));
	$cant_imp 		= intval($_POST['cant_imp']);
  $ip_imp  	= mysqli_real_escape_string($conn,(strip_tags($_POST['ip_imp'], ENT_QUOTES)));
	$n_serie  = mysqli_real_escape_string($conn,(strip_tags($_POST['n_serie'], ENT_QUOTES)));
  $fecha	= date(mysqli_real_escape_string($conn,(strip_tags($_POST['fecha'], ENT_QUOTES))));
  $impresion  	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['impresion'], ENT_QUOTES))));
  $copias  	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['copia'], ENT_QUOTES))));




	$sentencia = '
	UPDATE impresora_contador
  INNER JOIN impr_copias
  ON impresora_contador.id_impresora = impr_copias.id_impresora
	SET
	lugar_imp				= "'.$lugar_imp.'",
	nombre_imp				= "'.$nombre_imp.'",
	cant_imp			= "'.$cant_imp.'",
	ip_imp			= "'.$ip_imp.'",
	n_serie				= "'.$n_serie.'",
  fecha       = "'.$fecha.'",
  impresion     = "'.$impresion.'",
  copia     = "'.$copias.'"
	WHERE id_imprcopia = "'.$id.'"
	';
	$update = mysqli_query($conn,$sentencia)or die(mysqli_error());


	if($update){
		echo "<script>alert('Los datos han sido actualizados!'); window.location = '../impresoras.php'</script>";
	}else{
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = '../impresoras.php'</script>";
	}
}
 ?>
