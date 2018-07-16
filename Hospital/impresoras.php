<?php include("config/conn.php");

require_once 'controller/contador.php';
require_once 'controller/session.php';


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Impresoras</title>
  <?php  include ("vista/head.php");?>

</head>
<body>
  <div class="navbar-default">
    <div class="navbar-inner">
      <div class="container">
        <a class="navbar-brand" href="impresoras.php">Impresoras</a>
        <div class="pull-right">

          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Inventarios <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="administracion.php">Informatica</a></li>
              <li><a href="inventario_general.php">Inventario General</a></li>

                <li><a href="impresoras.php">Impresoras</a></li>

            </ul>
          </div>
          <?php if($login_session =='admin') {
            ?>
            <a href="vista/configuracion.php" title="Configurar" class="btn btn-default btn-md">
              <span class="glyphicon glyphicon-cog"></span>
            </a>
            <?php
          }
          ?>
          <a class="btn btn-primary btn-md" href="controller/logout.php" role="button">Cerrar sesión</a>

        </div>

      </div>
    </div>
    <!-- /navbar-inner -->
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <h2 class="text-center text-uppercase">Impresoras</h2>
    </div>
  </div>

  <div class="row">

    <div class="container">

      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Agregar impresora</button>
      <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal1">Agregar Datos</button>
      <a href="grafico_impresoras.php" class="btn btn-info btn-md">
                <span class="glyphicon glyphicon-signal"></span> Grafico
              </a>
    </div>
  </div>
  <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12 ocultar">
    <div class="col-sm-offset-2 col-sm-8">
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
          <?php
          include('controller/eliminar_impr.php');

          ?>
          <?php echo $resulta; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">

    <div class="row">
      <div class="span12">
        <div class="content">

          <div class="col-sm-12">
            <table id="impresora_data" class="table table-bordered table-hover table-condensed response" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <td>Lugar</td>
                  <td>Nombre</td>
                  <td>Cant</td>
                  <td>Ip</td>
                  <td>N° Serie</td>
                  <td>Fecha</td>
                  <td>Impresiones</td>
                  <td>Copias</td>
                  <th> Acciones </th>
                </tr>
              </thead>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar impresora</h4>

        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="" method="POST">
            <div class="form-group">

            </div>
            <!-- <input type="hidden" id="id_impresora" name="id_impresora" value="0"> -->
            <input type="hidden" id="opcion" name="opcion" value="registrar">
            <div class="form-group">
              <label for="lugar_imp" class="col-sm-2 control-label">Lugar</label>
              <div class="col-sm-8"><input id="lugar_imp" name="lugar_imp" type="text" class="form-control"  autofocus required></div>
            </div>
            <div class="form-group">
              <label for="nombre_imp" class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-8"><input id="nombre_imp" name="nombre_imp" type="text" class="form-control" required ></div>
            </div>
            <div class="form-group">
              <label for="cant_imp" class="col-sm-2 control-label">Cantidad</label>
              <div class="col-sm-8"><input id="cant_imp" name="cant_imp" type="number" class="form-control" maxlength="8" required></div>
            </div>
            <div class="form-group">
              <label for="ip_imp" class="col-sm-2 control-label">Ip</label>
              <div class="col-sm-8"><input id="ip_imp" name="ip_imp" type="text" class="form-control" required></div>
            </div>
            <div class="form-group">
              <label for="n_serie" class="col-sm-2 control-label">N° serie</label>
              <div class="col-sm-8"><input id="n_serie" name="n_serie" type="text" class="form-control" required></div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                <input type="submit" name="submit2" id="submit2" class="btn btn-primary" value="Guardar">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- end modal  -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Datos</h4>

        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="" method="POST">

            <!-- <input type="hidden" id="id_impresora" name="id_impresora" value="0"> -->
            <div class="form-group">
              <div align="center">


                <?php
                $sql = mysqli_query($conn,"SELECT DISTINCT id_impresora,nombre_imp FROM impresora_contador ORDER BY id_impresora");
                echo "<select name='myselectbox' required>
                  <option value=''>Seleccione una impresora</option>";
                  while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<option value='$row[id_impresora]'>$row[nombre_imp]</option>"; // if you want to
                    //get the name into table, then use like this
                    //echo "<option value='$row[name]'>$row[name]</option>";  or
                    //echo "<option>$row[name]</option>";
                  }
                  echo "</select>";
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label for="fecha" class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-8"><input id="fecha" name="fecha" type="date" class="form-control" required ></div>
              </div>
              <div class="form-group">
                <label for="n_impresion" class="col-sm-2 control-label">N° impresion</label>
                <div class="col-sm-8"><input id="n_impresion" name="n_impresion" type="text" class="form-control" required></div>
              </div>
              <div class="form-group">
                <label for="n_copia" class="col-sm-2 control-label">N° copias</label>
                <div class="col-sm-8"><input id="n_copia" name="n_copia" type="text" class="form-control" required></div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Guardar">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/tabla-impresora.js"></script>
  </body>
  </html>
