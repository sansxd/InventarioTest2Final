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
        <a class="navbar-brand" href="index.php">Inventario General</a>



      </div>
    </div>
    <!-- /navbar-inner -->
  </div><br />

  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="content">
          <?php
          // $id = intval($_GET['id']);


          if(isset($_POST['edit']) && $_POST['edit'] == 'Editar'){

            $id_get = $_POST['ID']; //GET THE ID VIA URL
            $sqlquery = "SELECT * FROM inventario_publico WHERE ID='$id_get'";
            $sql = mysqli_query($conn, $sqlquery);
            if(mysqli_num_rows($sql) == 0){
              header("Location: inventario_genral.php");
            }else{
              $row = mysqli_fetch_assoc($sql);
            }
          }else {
            header("Location: inventario_genral.php");
          }

          ?>

          <blockquote>
            Editar
          </blockquote>
          <form name="form1" id="form1" class="form-horizontal row-fluid" action="controller/update-edit.php" method="POST" >
            <div>
              <input type="text" name="id" id="id" value="<?php echo $row['ID']; ?>" placeholder="Tidak perlu di isi" class="invisible" readonly="readonly">
            </div>
            <div class="col-sm-6">
              <div class="control-group">
                <label class="control-label" for="nombre_campo">Nombre Campo:</label>
                <div class="controls">
                  <input type="text" name="nombre_campo" id="nombre_campo" value="<?php echo $row['nombre_campo']; ?>" placeholder="Nombre Campo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cod_equipo">Codigo equipo:</label>
                <div class="controls">
                  <input type="text" name="cod_equipo" id="cod_equipo" value="<?php echo $row['cod_equipo']; ?>" placeholder="Codigo equipo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="tipo_equipo">Tipo de equipo:</label>
                <div class="controls">
                  <input type="text" name="tipo_equipo" id="tipo_equipo" value="<?php echo $row['tipo_equipo']; ?>" placeholder="Tipo de equipo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="sigla">Sigla:</label>
                <div class="controls">
                  <input type="text" name="sigla" id="sigla" value="<?php echo $row['sigla']; ?>" placeholder="Sigla" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="marca">Marca:</label>
                <div class="controls">
                  <input type="text" name="marca" id="marca" value="<?php echo $row['marca']; ?>" placeholder="Marca" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="modelo">Modelo:</label>
                <div class="controls">
                  <input type="text" name="modelo" id="modelo" value="<?php echo $row['modelo']; ?>" placeholder="Modelo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="numero_serie">N° de Serie:</label>
                <div class="controls">
                  <input type="text" name="numero_serie" id="numero_serie" value="<?php echo $row['numero_serie']; ?>" placeholder="N° de serie" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cod_interno">Codigo interno:</label>
                <div class="controls">
                  <input type="text" name="cod_interno" id="cod_interno" value="<?php echo $row['cod_interno']; ?>" placeholder="Codigo interno" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="descripcion">Descripcion:</label>
                <div class="controls">
                  <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>" placeholder="Descripcion" class="form-control span8 tip" maxlength="200">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="empresa">Empresa:</label>
                <div class="controls">
                  <input type="text" name="empresa" id="empresa" value="<?php echo $row['empresa']; ?>" placeholder="Empresa" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="area">Area:</label>
                <div class="controls">
                  <input type="text" name="area" id="area" value="<?php echo $row['area']; ?>" placeholder="Area" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="ubicacin">Ubicacion:</label>
                <div class="controls">
                  <input type="text" name="ubicacin" id="ubicacin" value="<?php echo $row['ubicacin']; ?>" placeholder="Ubicacion" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="centro_costo">Centro costo:</label>
                <div class="controls">
                  <input type="text" name="centro_costo" id="centro_costo" value="<?php echo $row['centro_costo']; ?>" placeholder="Centro costo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cod_usuario">Codigo usuario:</label>
                <div class="controls">
                  <input type="text" name="cod_usuario" id="cod_usuario" value="<?php echo $row['cod_usuario']; ?>" placeholder="Codigo usuario" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="nombres">Nombres:</label>
                <div class="controls">
                  <input type="text" name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" placeholder="Nombres" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="ap_paterno">Apellido paterno:</label>
                <div class="controls">
                  <input type="text" name="ap_paterno" id="ap_paterno" value="<?php echo $row['ap_paterno']; ?>" placeholder="Apellido paterno" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
            </div>
            <!-- aqui lo volvemos horizontal -->
            <div class="col-sm-6">
              <div class="control-group">
                <label class="control-label" for="ap_materno">Apellido materno:</label>
                <div class="controls">
                  <input type="text" name="ap_materno" id="ap_materno" value="<?php echo $row['ap_materno']; ?>" placeholder="Apellido materno" class="form-control span8 tip" maxlength="45">
                </div>
              </div>




              <div class="control-group">
                <label class="control-label" for="cod_proveedor">Codigo proveedor:</label>
                <div class="controls">
                  <input type="text" name="cod_proveedor" id="cod_proveedor" value="<?php echo $row['cod_proveedor']; ?>" placeholder="Codigo proveedor" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="fecha_compra">Fecha de compra:</label>
                <div class="controls">
                  <input type="text" name="fecha_compra" id="fecha_compra" value="<?php echo $row['fecha_compra']; ?>" placeholder="Fecha de compra" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="n_factura">N° Factura:</label>
                <div class="controls">
                  <input type="text" name="n_factura" id="n_factura" value="<?php echo $row['n_factura']; ?>" placeholder="N° Factura" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="valor_compra">Valor de compra:</label>
                <div class="controls">
                  <input type="text" name="valor_compra" id="valor_compra" value="<?php echo $row['valor_compra']; ?>" placeholder="Valor de compra" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="status">Status:</label>
                <div class="controls">
                  <input type="text" name="status" id="status" value="<?php echo $row['status']; ?>" placeholder="Status" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="est_cons">Estado conserva:</label>
                <div class="controls">
                  <input type="text" name="est_cons" id="est_cons" value="<?php echo $row['est_cons']; ?>" placeholder="Estado conserva" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="grupo">Grupo:</label>
                <div class="controls">
                  <input type="text" name="grupo" id="grupo" value="<?php echo $row['grupo']; ?>" placeholder="Grupo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="grupo_descrip">Grupo descripcion:</label>
                <div class="controls">
                  <input type="text" name="grupo_descrip" id="grupo_descrip" value="<?php echo $row['grupo_descrip']; ?>" placeholder="Grupo descripcion" class="form-control span8 tip" maxlength="200">
                </div>
              </div><div class="control-group">
                <label class="control-label" for="subgrp">SubGrupo:</label>
                <div class="controls">
                  <input type="text" name="subgrp" id="subgrp" value="<?php echo $row['subgrp']; ?>" placeholder="SubGrupo" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="subgrp_desc">SubGrupo descripcion:</label>
                <div class="controls">
                  <input type="text" name="subgrp_desc" id="subgrp_desc" value="<?php echo $row['subgrp_desc']; ?>" placeholder="SubGrupo descripcion" class="form-control span8 tip" maxlength="200">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cuenta">Cuenta:</label>
                <div class="controls">
                  <input type="text" name="cuenta" id="cuenta" value="<?php echo $row['cuenta']; ?>" placeholder="Cuenta" class="form-control span8 tip" maxlength="45">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="vu_finan">V_U_Financiera:</label>
                <div class="controls">
                  <input type="text" name="vu_finan" id="vu_finan" value="<?php echo $row['vu_finan']; ?>" placeholder="V_U_Financiera" class="form-control span8 tip" maxlength="45">
                </div>
              </div><div class="control-group">
                <label class="control-label" for="valor_libro">Valor Libro a fin de año:</label>
                <div class="controls">
                  <input type="text" name="valor_libro" id="valor_libro" value="<?php echo $row['valor_libro']; ?>" placeholder="Valor" class="form-control span8 tip" maxlength="45">
                </div>
              </div><div class="control-group">
                <label class="control-label" for="valor_act">Valor Actualizado a fin de año:</label>
                <div class="controls">
                  <input type="text" name="valor_act" id="valor_act" value="<?php echo $row['valor_act']; ?>" placeholder="Valor a fin de año" class="form-control span8 tip" maxlength="45">
                </div>
              </div><div class="control-group">
                <label class="control-label" for="depre_acu">Depreciación Acumulada a fin de año:</label>
                <div class="controls">
                  <input type="text" name="depre_acu" id="depre_acu" value="<?php echo $row['depre_acu']; ?>" placeholder="Depreciación" class="form-control span8 tip" maxlength="45">
                </div>
              </div><div class="control-group">
                <label class="control-label" for="vida_rest">Vida Útil Restante a fin de año:</label>
                <div class="controls">
                  <input type="text" name="vida_rest" id="vida_rest" value="<?php echo $row['vida_rest']; ?>" placeholder="Vida Útil a fin de año" class="form-control span8 tip" maxlength="45">
                </div>
              </div>

            </div>
            <br>

            <div class="control-group col-sm-6">
              <div class="controls">
                <input type="submit" name="update_genral" id="update_genral" value="Actualizar" class="btn btn-md btn-primary"/>
                <a href="inventario_genral.php" class="btn btn-md btn-danger">Cancelar</a>
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
