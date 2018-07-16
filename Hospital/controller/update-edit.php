<?php
// require_once 'controller/session.php';
require_once '../config/conn.php';
if(isset($_POST['update'])){
	$id			= intval($_POST['id']);
	$edificio	= mysqli_real_escape_string($conn,(strip_tags($_POST['edificio'], ENT_QUOTES)));
	$usuario	= mysqli_real_escape_string($conn,(strip_tags($_POST['usuario'], ENT_QUOTES)));
	$marca  	= mysqli_real_escape_string($conn,(strip_tags($_POST['marca'], ENT_QUOTES)));
	$serial 		= mysqli_real_escape_string($conn,(strip_tags($_POST['serial'], ENT_QUOTES)));
	$nro_interno  = mysqli_real_escape_string($conn,(strip_tags($_POST['nro_interno'], ENT_QUOTES)));
	$monitor	= mysqli_real_escape_string($conn,(strip_tags($_POST['monitor'], ENT_QUOTES)));
	$mouse	= mysqli_real_escape_string($conn,(strip_tags($_POST['mouse'], ENT_QUOTES)));
	$teclado	= mysqli_real_escape_string($conn,(strip_tags($_POST['teclado'], ENT_QUOTES)));
	$adaptador	= mysqli_real_escape_string($conn,(strip_tags($_POST['adaptador'], ENT_QUOTES)));
	$rj45	= mysqli_real_escape_string($conn,(strip_tags($_POST['rj45'], ENT_QUOTES)));
	$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
	$telefono	= mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
	$ip	= mysqli_real_escape_string($conn,(strip_tags($_POST['ip'], ENT_QUOTES)));
	$mac	= mysqli_real_escape_string($conn,(strip_tags($_POST['mac'], ENT_QUOTES)));
	$antivirus	= mysqli_real_escape_string($conn,(strip_tags($_POST['antivirus'], ENT_QUOTES)));
	$impresora	= mysqli_real_escape_string($conn,(strip_tags($_POST['impresora'], ENT_QUOTES)));
	$tinta	= mysqli_real_escape_string($conn,(strip_tags($_POST['tinta'], ENT_QUOTES)));
	$tipodetinta	= mysqli_real_escape_string($conn,(strip_tags($_POST['tipodetinta'], ENT_QUOTES)));

	//$update = mysqli_query($conn,"UPDATE inventario SET edificio ='$edificio', MARCA='$marca', SERIAL_PC='$serial', N_INTERNO_INVENTARIO='$nro_interno',MONITOR='$monitor',MOUSE='$mouse',TECLADO='$teclado',ADAPTADOR='$adaptador',RJ45='$rj45',NOMBRE='$nombre',TELEFONO='$telefono',IP='$ip',MAC='$mac',ANTIVIRUS='$antivirus',IMPRESORA='$impresora',TINTA='$tinta',TIPODETINTA='$tipodetinta' WHERE ID_INVENTARIO = $id")or die(mysqli_error());


	$sentencia = '
	UPDATE inventario
	SET
	EDIFICIO				= "'.$edificio.'",
	USUARIO				= "'.$usuario.'",
	Marca			= "'.$marca.'",
	SERIAL_PC			= "'.$serial.'",
	N_INTERNO_INVENTARIO				= "'.$nro_interno.'",
	MONITOR				= "'.$monitor.'",
	MOUSE		= "'.$mouse.'",
	TECLADO				= "'.$teclado.'",
	ADAPTADOR			= "'.$adaptador.'",
	RJ45			= "'.$rj45.'",
	NOMBRE			= "'.$nombre.'",
	TELEFONO				= "'.$telefono.'",
	IP			= "'.$ip.'",
	MAC			= "'.$mac.'",
	ANTIVIRUS				= "'.$antivirus.'",
	IMPRESORA				= "'.$impresora.'",
	TINTA					= "'.$tinta.'",
	TIPODETINTA				= "'.$tipodetinta.'"
	WHERE ID_INVENTARIO = "'.$id.'"
	';
	$update = mysqli_query($conn,$sentencia)or die(mysqli_error());


	if($update){
		echo "<script>alert('Los datos han sido actualizados!'); window.location = '../administracion.php'</script>";
	}else{
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = '../administracion.php'</script>";
	}
}if(isset($_POST['update_genral'])){
	$id			= intval($_POST['id']);
	$nombre_campo	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['nombre_campo'], ENT_QUOTES))));
	$cod_equipo	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['cod_equipo'], ENT_QUOTES))));
	$tipo_equipo	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['tipo_equipo'], ENT_QUOTES))));
	$sigla	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['sigla'], ENT_QUOTES))));
	$marca	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['marca'], ENT_QUOTES))));
	$modelo	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['modelo'], ENT_QUOTES))));
	$numero_serie	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['numero_serie'], ENT_QUOTES))));
	$cod_interno	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['cod_interno'], ENT_QUOTES))));
	$descripcion	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['descripcion'], ENT_QUOTES))));
	$empresa	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['empresa'], ENT_QUOTES))));
	$area	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['area'], ENT_QUOTES))));
	$ubicacin	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['ubicacin'], ENT_QUOTES))));
	$centro_costo	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['centro_costo'], ENT_QUOTES))));
	$cod_usuario	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['cod_usuario'], ENT_QUOTES))));
	$nombres	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['nombres'], ENT_QUOTES))));
	$ap_paterno	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['ap_paterno'], ENT_QUOTES))));
	$ap_materno	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['ap_materno'], ENT_QUOTES))));
	$cod_proveedor	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['cod_proveedor'], ENT_QUOTES))));
	$fecha_compra	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_compra'], ENT_QUOTES))));
	$n_factura	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['n_factura'], ENT_QUOTES))));
	$valor_compra	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['valor_compra'], ENT_QUOTES))));
	$status	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['status'], ENT_QUOTES))));
	$est_cons	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['est_cons'], ENT_QUOTES))));
	$grupo	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['grupo'], ENT_QUOTES))));
	$grupo_descrip	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['grupo_descrip'], ENT_QUOTES))));
	$subgrp	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['subgrp'], ENT_QUOTES))));
	$subgrp_desc	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['subgrp_desc'], ENT_QUOTES))));
	$cuenta	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['cuenta'], ENT_QUOTES))));
	$vu_finan	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['vu_finan'], ENT_QUOTES))));
	$valor_libro	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['valor_libro'], ENT_QUOTES))));
	$valor_act	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['valor_act'], ENT_QUOTES))));
	$depre_acu	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['depre_acu'], ENT_QUOTES))));
	$vida_rest	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['vida_rest'], ENT_QUOTES))));

	$sentencia2 = '
	UPDATE inventario_publico
	SET
	nombre_campo	= "'.$nombre_campo.'",
	cod_equipo			= "'.$cod_equipo.'",
	tipo_equipo		= "'.$tipo_equipo.'",
	sigla			= "'.$sigla.'",
	marca				= "'.$marca.'",
	modelo				= "'.$modelo.'",
	numero_serie		= "'.$numero_serie.'",
	cod_interno				= "'.$cod_interno.'",
	descripcion			= "'.$descripcion.'",
	empresa			= "'.$empresa.'",
	area			= "'.$area.'",
	ubicacin				= "'.$ubicacin.'",
	centro_costo		= "'.$centro_costo.'",
	cod_usuario		= "'.$cod_usuario.'",
	nombres			= "'.$nombres.'",
	ap_paterno			= "'.$ap_paterno.'",
	ap_materno			= "'.$ap_materno.'",
	cod_proveedor		= "'.$cod_proveedor.'",
	fecha_compra	= "'.$fecha_compra.'",
	n_factura	= "'.$n_factura.'",
	valor_compra	= "'.$valor_compra.'",
	status	= "'.$status.'",
	est_cons	= "'.$est_cons.'",
	grupo	= "'.$grupo.'",
	grupo_descrip	= "'.$grupo_descrip.'",
	subgrp	= "'.$subgrp.'",
	subgrp_desc	= "'.$subgrp_desc.'",
	cuenta	= "'.$cuenta.'",
	vu_finan	= "'.$vu_finan.'",
	valor_libro	= "'.$valor_libro.'",
	valor_act	= "'.$valor_act.'",
	depre_acu	= "'.$depre_acu.'",
	vida_rest				= "'.$vida_rest.'"
	WHERE ID = "'.$id.'"
	';
	$update2 = mysqli_query($conn,$sentencia2)or die(mysqli_error());

	if($update2){
		echo "<script>alert('Los datos han sido actualizados!'); window.location = '../inventario_general.php'</script>";
	}else{
		echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = '../iinventario_general.php'</script>";
	}
}

?>
