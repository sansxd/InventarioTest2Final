<?php
include "config/conn.php";
require_once 'controller/session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <?php include("vista/head.php");?>
  </head>
  <body>
    <div class="navbar navbar-default">
      <div class="navbar-inner">
        <div class="container">
          <a class="navbar-brand" href="inventario_general.php">Inventario General</a>

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

            if (empty($nombres)) {
              echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El campo <strong>NOMBRE</strong> no puede quedar vacio</div>';

            }else {


               $sentencia ="INSERT INTO inventario_publico";
               $sentencia.=" (nombre_campo,cod_equipo,tipo_equipo,sigla,marca,modelo,numero_serie,cod_interno,descripcion,empresa,area,ubicacin,centro_costo,cod_usuario,nombres,ap_paterno,ap_materno,cod_proveedor,fecha_compra,n_factura,valor_compra,status,est_cons,grupo,grupo_descrip,subgrp,subgrp_desc,cuenta,vu_finan,valor_libro,valor_act,depre_acu,vida_rest)";
               $sentencia.= " VALUES ('$nombre_campo','$cod_equipo','$tipo_equipo','$sigla','$marca','$modelo','$numero_serie','$cod_interno','$descripcion','$empresa','$area','$ubicacin','$centro_costo','$cod_usuario','$nombres','$ap_paterno','$ap_materno','$cod_proveedor','$fecha_compra','$n_factura','$valor_compra','$status','$est_cons','$grupo','$grupo_descrip','$subgrp','$subgrp_desc','$cuenta','$vu_finan','$valor_libro','$valor_act','$depre_acu','$vida_rest')";
                //consulta para insertar datos
                $insert = mysqli_query($conn,$sentencia) or die(mysqli_error());
                if(!$insert){
                  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';

                }else{
                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';

                  echo "<script>window.setTimeout(function() { window.location = 'inventario_general.php' }, 2000)</script>";
                  // header("Location: administracion.html");
                }
              }
            }

            ?>
            <div id="resultado"></div>
            <div class="alert alert-info" > <strong>Todos los campos son obligatorios.</strong></div>

            <blockquote>
              Agregar
            </blockquote>
            <form name="form2" id="form2" class="form-horizontal row-fluid" action="registro_genral.php" method="POST" onsubmit="processForm()">
              <div class="col-sm-6">
              <div class="control-group">
                <label class="control-label" for="nombre_campo">Nombre Campo:</label>
                <div class="controls">
                  <input type="text" name="nombre_campo" id="nombre_campo" placeholder="Nombre Campo" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cod_equipo">Codigo equipo:</label>
                <div class="controls">
                  <input type="text" name="cod_equipo" id="cod_equipo" placeholder="Codigo equipo" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="tipo_equipo">Tipo de equipo:</label>
                <div class="controls">
                  <input type="text" name="tipo_equipo" id="tipo_equipo" placeholder="Tipo de equipo" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="sigla">Sigla:</label>
                <div class="controls">
                  <input type="text" name="sigla" id="sigla" placeholder="Sigla" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="marca">Marca:</label>
                <div class="controls">
                  <input type="text" name="marca" id="marca" placeholder="Marca" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="modelo">Modelo:</label>
                <div class="controls">
                  <input type="text" name="modelo" id="modelo" placeholder="Modelo" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="numero_serie">N° de Serie:</label>
                <div class="controls">
                  <input type="text" name="numero_serie" id="numero_serie" placeholder="N° de serie" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cod_interno">Codigo interno:</label>
                <div class="controls">
                  <input type="text" name="cod_interno" id="cod_interno	" placeholder="Codigo interno" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="descripcion">Descripcion:</label>
                <div class="controls">
                  <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control span8 tip" maxlength="200" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="empresa">Empresa:</label>
                <div class="controls">
                  <input type="text" name="empresa" id="empresa" placeholder="Empresa" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="area">Area:</label>
                <div class="controls">
                  <input type="text" name="area" id="area" placeholder="Area" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="ubicacin">Ubicacion:</label>
                <div class="controls">
                  <input type="text" name="ubicacin" id="ubicacin" placeholder="Ubicacion" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="centro_costo">Centro costo:</label>
                <div class="controls">
                  <input type="text" name="centro_costo" id="centro_costo" placeholder="Centro costo" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cod_usuario">Codigo usuario:</label>
                <div class="controls">
                  <input type="text" name="cod_usuario" id="cod_usuario" placeholder="Codigo usuario" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="nombres">Nombres:</label>
                <div class="controls">
                  <input type="text" name="nombres" id="nombres" placeholder="Nombres" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="ap_paterno">Apellido paterno:</label>
                <div class="controls">
                  <input type="text" name="ap_paterno" id="ap_paterno" placeholder="Apellido paterno" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>
            </div>
              <!-- aqui lo volvemos horizontal -->
                <div class="col-sm-6">
              <div class="control-group">
                <label class="control-label" for="ap_materno">Apellido materno:</label>
                <div class="controls">
                  <input type="text" name="ap_materno" id="ap_materno" placeholder="Apellido materno" class="form-control span8 tip" maxlength="55" required>
                </div>
              </div>




                  <div class="control-group">
                    <label class="control-label" for="cod_proveedor">Codigo proveedor:</label>
                    <div class="controls">
                      <input type="text" name="cod_proveedor" id="cod_proveedor" placeholder="Codigo proveedor" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="fecha_compra">Fecha de compra:</label>
                    <div class="controls">
                      <input type="text" name="fecha_compra" id="fecha_compra" placeholder="Fecha de compra" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="n_factura">N° Factura:</label>
                    <div class="controls">
                      <input type="text" name="n_factura" id="n_factura" placeholder="N° Factura" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="valor_compra">Valor de compra:</label>
                    <div class="controls">
                      <input type="text" name="valor_compra" id="valor_compra" placeholder="Valor de compra" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="status">Status:</label>
                    <div class="controls">
                      <input type="text" name="status" id="status" placeholder="Status" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="est_cons">Estado conserva:</label>
                    <div class="controls">
                      <input type="text" name="est_cons" id="est_cons" placeholder="Estado conserva" class="form-control span8 tip" maxlength="55"required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="grupo">Grupo:</label>
                    <div class="controls">
                      <input type="text" name="grupo" id="grupo" placeholder="Grupo" class="form-control span8 tip" maxlength="55"required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="grupo_descrip">Grupo descripcion:</label>
                    <div class="controls">
                      <input type="text" name="grupo_descrip" id="grupo_descrip" placeholder="Grupo descripcion" class="form-control span8 tip" maxlength="200" required>
                    </div>
                  </div><div class="control-group">
                    <label class="control-label" for="subgrp">SubGrupo:</label>
                    <div class="controls">
                      <input type="text" name="subgrp" id="subgrp" placeholder="SubGrupo" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="subgrp_desc">SubGrupo descripcion:</label>
                    <div class="controls">
                      <input type="text" name="subgrp_desc" id="subgrp_desc" placeholder="SubGrupo descripcion" class="form-control span8 tip" maxlength="200" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="cuenta">Cuenta:</label>
                    <div class="controls">
                      <input type="text" name="cuenta" id="cuenta" placeholder="Cuenta" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="vu_finan">V_U_Financiera:</label>
                    <div class="controls">
                      <input type="text" name="vu_finan" id="vu_finan" placeholder="V_U_Financiera" class="form-control span8 tip" maxlength="55"required>
                    </div>
                  </div><div class="control-group">
                    <label class="control-label" for="valor_libro">Valor Libro a fin de año:</label>
                    <div class="controls">
                      <input type="text" name="valor_libro" id="valor_libro" placeholder="Valor" class="form-control span8 tip" maxlength="55" required>
                    </div>
                  </div><div class="control-group">
                    <label class="control-label" for="valor_act">Valor Actualizado a fin de año:</label>
                    <div class="controls">
                      <input type="text" name="valor_act" id="valor_act" placeholder="Valor a fin de año" class="form-control span8 tip" maxlength="55"required>
                    </div>
                  </div><div class="control-group">
                    <label class="control-label" for="depre_acu">Depreciación Acumulada a fin de año:</label>
                    <div class="controls">
                      <input type="text" name="depre_acu" id="depre_acu" placeholder="Depreciación" class="form-control span8 tip" maxlength="55"required>
                    </div>
                  </div><div class="control-group">
                    <label class="control-label" for="vida_rest">Vida Útil Restante a fin de año:</label>
                    <div class="controls">
                      <input type="text" name="vida_rest" id="vida_rest" placeholder="Vida Útil a fin de año" class="form-control span8 tip" maxlength="55"required>
                    </div>
                  </div>

                </div>
              <br>

              <div class="control-group col-sm-6">
                <div class="controls">
                  <button type="submit" name="submit" id="submit"  class="btn btn-md btn-primary" >Registrar</button>
                  <a href="inventario_general.php" class="btn btn-md btn-danger">Cancelar</a>
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



  </body>
</html>
