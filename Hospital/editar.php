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
            // esta parte del codigo sirve para redireecionar a traves de la id hacia administracion.
            // $id = intval($_GET['id']);
            if(isset($_POST['edit']) && $_POST['edit'] == 'Editar'){

              $id_get = $_POST['ID_INVENTARIO']; //GET THE ID VIA URL
              $sqlquery = "SELECT * FROM inventario WHERE ID_INVENTARIO='$id_get'";
              $sql = mysqli_query($conn, $sqlquery);
              if(mysqli_num_rows($sql) == 0){
                header("Location: administracion.php");
              }else{
                $row = mysqli_fetch_assoc($sql);
              }
            }else {
              header("Location: administracion.php");
            }

            ?>

            <blockquote>
              Actualizar datos del Inventario
            </blockquote>
            <form name="form1" id="form1" class="form-horizontal row-fluid" action="controller/update-edit.php" method="POST" >
              <div>
              <input type="text" name="id" id="id" value="<?php echo $row['ID_INVENTARIO']; ?>" placeholder="Tidak perlu di isi" class="invisible" readonly="readonly">
            </div>
              <div class="col-sm-6">
                <div class="control-group ">
                  <label class="control-label" for="edificio">Edificio :</label>
                  <div class="controls">
                    <input type="text" name="edificio" id="edificio" value="<?php echo $row['EDIFICIO']; ?>" placeholder="" class="form-control " maxlength="25">
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="usuario">Usuario :</label>
                  <div class="controls">
                    <input type="text" name="usuario" id="usuario" value="<?php echo $row['USUARIO']; ?>" placeholder="" class="form-control " maxlength="25">
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="ip">Ip :</label>
                  <div class="controls">
                    <input type="text" name="ip" id="ip" value="<?php echo $row['IP']; ?>" placeholder="" class="form-control "  maxlength="20" >
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="nombre">Nombre :</label>
                  <div class="controls">
                    <input type="text" name="nombre" id="nombre" value="<?php echo $row['NOMBRE']; ?>" placeholder="" class="form-control " maxlength="45" >
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="telefono">Teléfono :</label>
                  <div class="controls">
                    <input type="number" name="telefono" id="telefono" value="<?php echo $row['TELEFONO']; ?>" placeholder="" class="form-control " maxlength="20" >
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="marca">Marca :</label>
                  <div class="controls">
                    <input type="text" name="marca" id="marca" value="<?php echo $row['MARCA']; ?>" placeholder="" class="form-control " maxlength="50" >
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="serial">Serial</label>
                  <div class="controls">
                    <input name="serial" id="serial" value="<?php echo $row['SERIAL_PC']; ?>" class="form-control " type="text"  maxlength="65"  />
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="nro_interno">Nro Intero :</label>
                  <div class="controls">
                    <input name="nro_interno" id="nro_interno" value="<?php echo $row['N_INTERNO_INVENTARIO']; ?>" class="form-control " type="text" maxlength="30"  />
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="monitor">Monitor :</label>
                  <div class="controls">
                    <input name="monitor" id="monitor" value="<?php echo $row['MONITOR']; ?>" class=" form-control " type="text"   maxlength="35"   />
                  </div>
                </div>
              </div>
              <!-- separacion horizontal -->
              <div class="col-sm-6">

                <div class="control-group ">
                  <label class="control-label" for="mouse">Mouse :</label>
                  <div class="controls">
                    <input type="text" name="mouse" id="mouse" value="<?php echo $row['MOUSE']; ?>" placeholder="" class="form-control " maxlength="15" >
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="teclado">Teclado :</label>
                  <div class="controls">
                    <input type="text" name="teclado" id="teclado" value="<?php echo $row['TECLADO']; ?>" placeholder="" class="form-control " maxlength="15" >
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="adaptador">Adaptador :</label>
                  <div class="controls">
                    <input type="text" name="adaptador" id="adaptador" value="<?php echo $row['ADAPTADOR']; ?>" placeholder="" class="form-control " maxlength="25">
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="rj45">RJ45 :</label>
                  <div class="controls">
                    <input type="text" name="rj45" id="rj45" value="<?php echo $row['RJ45']; ?>" placeholder="" class="form-control "  maxlength="18"  >
                  </div>
                </div>


                <div class="control-group ">
                  <label class="control-label" for="mac">Mac :</label>
                  <div class="controls">
                    <input type="text" name="mac" id="mac" value="<?php echo $row['MAC']; ?>" placeholder="" class="form-control " maxlength="20">
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="antivirus">Antivirus :</label>
                  <div class="controls">
                    <input type="text" name="antivirus" id="antivirus" value="<?php echo $row['ANTIVIRUS']; ?>" placeholder="" class="form-control " maxlength="16"  >
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="impresora">Impresora :</label>
                  <div class="controls">
                    <input type="text" name="impresora" id="impresora" value="<?php echo $row['IMPRESORA']; ?>" placeholder="" class="form-control " maxlength="60" >
                  </div>
                </div>
                <div class="control-group ">
                  <label class="control-label" for="tinta">Tinta :</label>
                  <div class="controls">
                    <input type="text" name="tinta" id="tinta" value="<?php echo $row['TINTA']; ?>" placeholder="" class="form-control " maxlength="15">
                  </div>
                </div>

                <div class="control-group ">
                  <label class="control-label" for="tipodetinta">Tipo de tinta :</label>
                  <div class="controls">
                    <input type="text" name="tipodetinta" id="tipodetinta" value="<?php echo $row['TIPODETINTA']; ?>" placeholder="" class="form-control " maxlength="18" >
                  </div>
                </div>
              </div>
              <br>

              <div class="control-group col-sm-6">
                <div class="controls">
                  <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-md btn-primary"/>
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
