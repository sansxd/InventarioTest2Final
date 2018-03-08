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
			}
  ?>
