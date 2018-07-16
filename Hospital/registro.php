<?php
include "config/conn.php";
require_once 'controller/session.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("vista/head.php");?>
  </head>
  <body>
    <div class="navbar navbar-default">
      <div class="navbar-inner">
        <div class="container">
          <a class="navbar-brand" href="index.php">Inventario Web</a>

        </div>
      </div>
      <!-- /navbar-inner -->
    </div><br />

    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="content">
            <?php
            if(isset($_POST['submit'])){
              $edificio	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['edificio'], ENT_QUOTES))));
              $usuario	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['usuario'], ENT_QUOTES))));
              $marca  	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['marca'], ENT_QUOTES))));
              $serial 		= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['serial'], ENT_QUOTES))));
              $nro_interno  = trim(mysqli_real_escape_string($conn,(strip_tags($_POST['nro_interno'], ENT_QUOTES))));
              $monitor	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['monitor'], ENT_QUOTES))));
              $mouse	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['mouse'], ENT_QUOTES))));
              $teclado	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['teclado'], ENT_QUOTES))));
              $adaptador	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['adaptador'], ENT_QUOTES))));
              $rj45	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['rj45'], ENT_QUOTES))));
              $nombre	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES))));
              $telefono	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES))));
              $ip	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['ip'], ENT_QUOTES))));
              $mac	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['mac'], ENT_QUOTES))));
              $antivirus	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['antivirus'], ENT_QUOTES))));
              $impresora	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['impresora'], ENT_QUOTES))));
              $tinta	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['tinta'], ENT_QUOTES))));
              $tipodetinta	= trim(mysqli_real_escape_string($conn,(strip_tags($_POST['tipodetinta'], ENT_QUOTES))));


            if (empty($nombre)) {
              echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El campo <strong>NOMBRE</strong> no puede quedar vacio</div>';

            }else {

              $edificio = $edificio ?: 'SIN EDIFICIO'; //si el campo esta vacio se ingresa esto
              $serial = $serial ?: 'SIN SERIAL';



                //consulta para insertar datos
                $insert = mysqli_query($conn, "INSERT INTO inventario(ID_INVENTARIO, EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO,MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA)
                VALUES(NULL,'$edificio','$usuario', '$marca', '$serial', '$nro_interno','$monitor','$mouse','$teclado','$adaptador','$rj45','$nombre','$telefono','$ip','$mac','$antivirus','$impresora','$tinta','$tipodetinta')") or die(mysqli_error());
                if(!$insert){
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                }else{
                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';

                  echo "<script>window.setTimeout(function() { window.location = 'administracion.php' }, 2000)</script>";
                  // header("Location: administracion.html");
                }
              }
            }

            ?>
            <div class="alert alert-info" >El campo obligatorio es <strong>NOMBRE.</strong></div>

            <blockquote>
              Agregar cliente
            </blockquote>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" onsubmit="processForm()">
              <div class="col-sm-6">
              <div class="control-group">
                <label class="control-label" for="edificio">Edificio :</label>
                <div class="controls">
                  <input type="text" name="edificio" id="edificio" placeholder="Edificio" class="form-control span8 tip" maxlength="25">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="usuario">Usuario :</label>
                <div class="controls">
                  <input type="text" name="usuario" id="usuario" placeholder="Usuario" class="form-control span8 tip" maxlength="25">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="ip">Ip :</label>
                <div class="controls">
                  <input name="ip" id="ip" class=" form-control span8 tip" type="text" placeholder="Ip" maxlength="20" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="nombre">Nombre :</label>
                <div class="controls">
                  <input name="nombre" id="nombre" class=" form-control span8 tip" type="text" placeholder="Nombre" pattern=".{3,45}" title="Ingrese mas de 3 caracteres" maxlength="45" required/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="telefono">Telefono :</label>
                <div class="controls">
                  <input name="telefono" id="telefono" class=" form-control span8 tip" type="number" placeholder="Telefono" maxlength="20" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="marca">Marca :</label>
                <div class="controls">
                  <input type="text" name="marca" id="marca" placeholder="Marca" class="form-control span8 tip" maxlength="50" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="serial">Serial :</label>
                <div class="controls">
                  <input name="serial" id="serial" class="form-control span8 tip" type="text" placeholder="Serial" maxlength="65"  />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="nro_interno">Nro Interno :</label>
                <div class="controls">
                  <input name="nro_interno" id="nro_interno" class=" form-control span8 tip" type="text" placeholder="Nro interno" maxlength="30" />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="monitor">Monitor :</label>
                <div class="controls">
                  <input name="monitor" id="monitor" class=" form-control span8 tip" type="text" placeholder="Monitor" maxlength="35"  />
                </div>
              </div>
            </div>
              <!-- aqui lo volvemos horizontal -->
                <div class="col-sm-6">

              <div class="control-group">
                <label class="control-label" for="mouse">Mouse :</label>
                <div class="controls">
                  <input name="mouse" id="mouse" class=" form-control span8 tip" type="text" placeholder="Mouse" maxlength="15"  />
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="teclado">Teclado :</label>
                <div class="controls">
                  <input name="teclado" id="teclado" class=" form-control span8 tip" type="text" placeholder="Teclado"  maxlength="15"/>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="adaptador">Adaptador :</label>
                <div class="controls">
                  <input name="adaptador" id="adaptador" class=" form-control span8 tip" type="text" placeholder="Adaptador"  maxlength="25"/>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="rj45">RJ45 :</label>
                <div class="controls">
                  <input name="rj45" id="rj45" class=" form-control span8 tip" type="text" placeholder="RJ45" maxlength="18" />
                </div>
              </div>




              <div class="control-group">
                <label class="control-label" for="mac">Mac :</label>
                <div class="controls">
                  <input name="mac" id="mac" class=" form-control span8 tip" type="text" placeholder="Mac" maxlength="20" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="antivirus">Antivirus :</label>
                <div class="controls">
                  <input name="antivirus" id="antivirus" class=" form-control span8 tip" type="text" placeholder="Antivirus" maxlength="16" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="impresora">Impresora :</label>
                <div class="controls">
                  <input name="impresora" id="impresora" class=" form-control span8 tip" type="text" placeholder="Impresora" maxlength="60" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="tinta">Tinta :</label>
                <div class="controls">
                  <input name="tinta" id="tinta" class=" form-control span8 tip" type="text" placeholder="Tinta" maxlength="15"  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="tipodetinta">Tipo de Tinta :</label>
                <div class="controls">
                  <input name="tipodetinta" id="tipodetinta" class=" form-control span8 tip" type="text" placeholder="Tipo de tinta" maxlength="18" />
                </div>
              </div>
                </div>
              <br>

              <div class="control-group col-sm-6">
                <div class="controls">
                  <button type="submit" name="submit" id="submit"  class="btn btn-md btn-primary" >Registrar</button>
                  <a href="administracion.php" class="btn btn-md btn-danger">Cancelar</a>
                </div>
              </div>
            </form>
          </div>
          <!--/.content-->
        </div>
        <!--/.span9-->
      </div>
    </div>
    <!--/.container-->

    <!--/.wrapper--><br />
    <?php
    include("vista/footer.php");
     ?>


  </body>
  </html>
