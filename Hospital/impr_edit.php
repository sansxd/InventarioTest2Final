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


  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="content">
          <?php
          // esta parte del codigo sirve para redireecionar a traves de la id hacia administracion.
          // $id = intval($_GET['id']);
          if(isset($_POST['edit']) && $_POST['edit'] == 'Editar'){
            $id_get = $_POST['id_imprcopia']; //GET THE ID VIA URL
            $sqlquery = "SELECT\n"
            . " id_imprcopia,\n"
            . " lugar_imp,\n"
            . " nombre_imp,\n"
            . " cant_imp,\n"
            . " ip_imp,\n"
            . " n_serie,\n"
            . " fecha,\n"
            . " impresion,\n"
            . " copia\n"
            . "FROM\n"
            . " impresora_contador\n"
            . "INNER JOIN\n"
            . " impr_copias ON impresora_contador.id_impresora = impr_copias.id_impresora\n"
            . "WHERE\n"
            . " id_imprcopia = '$id_get'";
                   $sql = mysqli_query($conn, $sqlquery);
            if(mysqli_num_rows($sql) == 0){
              header("Location: impresoras.php");
            }else{
              $row = mysqli_fetch_assoc($sql);
            }
          }else {
            header("Location: impresoras.php");
          }

          ?>

          <blockquote>
            Actualizar datos
          </blockquote>
          <form name="form1" id="form1" class="form-horizontal row-fluid" action="controller/edit_impresora.php" method="POST" >
            <div>
              <input type="text" name="id" id="id" value="<?php echo $row['id_imprcopia']; ?>" placeholder="Tidak perlu di isi" class="invisible" readonly="readonly">
            </div>
            <div class="control-group ">
              <label class="control-label" for="lugar_imp">Lugar:</label>
              <div class="controls">
                <input type="text" name="lugar_imp" id="lugar_imp" value="<?php echo $row['lugar_imp']; ?>" placeholder="" class="form-control " maxlength="70"required>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="nombre_imp">Nombre:</label>
              <div class="controls">
                <input type="text" name="nombre_imp" id="nombre_imp" value="<?php echo $row['nombre_imp']; ?>" placeholder="" class="form-control" maxlength="70"required>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="cant_imp">Cantidad:</label>
              <div class="controls">
                <input type="number" name="cant_imp" id="cant_imp" value="<?php echo $row['cant_imp']; ?>" placeholder="" class="form-control"  maxlength="20" required>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="ip_imp">Direccion IP:</label>
              <div class="controls">
                <input type="text" name="ip_imp" id="ip_imp" value="<?php echo $row['ip_imp']; ?>" placeholder="" class="form-control" maxlength="70" required>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="n_serie">N° de Serie:</label>
              <div class="controls">
                <input type="text" name="n_serie" id="n_serie" value="<?php echo $row['n_serie']; ?>" placeholder="" class="form-control" maxlength="70"required >
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="fecha">Fecha:</label>
              <div class="controls">
                <input type="date" name="fecha" id="fecha" value="<?php echo $row['fecha']; ?>" placeholder="" class="form-control" required >
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="impresion">Impresiones:</label>
              <div class="controls">
                <input type="text" name="impresion" id="impresion" value="<?php echo $row['impresion']; ?>" placeholder="" class="form-control" maxlength="70" required >
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label" for="copia">Copias:</label>
              <div class="controls">
                <input type="text" name="copia" id="copia" value="<?php echo $row['copia']; ?>" placeholder="" class="form-control" maxlength="70" required >
              </div>
            </div>
            <br>

            <div class="control-group col-sm-6">
              <div class="controls">
                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-md btn-primary"/>
                <a href="impresoras.php" class="btn btn-md btn-danger">Cancelar</a>
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

</body>
</html>
