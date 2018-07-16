<?php
include("config/conn.php");
// include('session.php');
require_once 'controller/session.php';
// if ($login_session == 'contabilidad') {
//   header ('Location: inventario_general.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <?php include("vista/head.php");?>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
		<link  type="text/css" href="https://cdn.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet">

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.12/plugins/export/export.min.js"></script>
  </head>
  <body>
    <div class="navbar-default">
      <div class="navbar-inner">
        <div class="container">
          <a class="navbar-brand" href="index.php">Inventario oficina Tic</a>
          <div class="pull-right">

            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Inventarios <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="index.php">Informatica</a></li>
                <li><a href="inventario_general.php">Inventario General</a></li>
                <?php if($login_session =='admin') {
                  ?>
                  <li><a href="impresoras.php">Impresoras</a></li>  <?php
                  }
                  ?>
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
    </div><br />

    <div class="container-fluid">
      <div class="row">
        <div class="span12">
          <div class="content">
            <?php
            include('controller/eliminar.php');

            ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Bienvenido :<a><?php echo $login_session; ?></a></h3>

              </div>

              <div class="panel-body">
                <?php
                if($login_session == 'admin') {
                  ?>
                  <div class="pull-left">
                    <a href="reportes.php" class="btn btn-sm btn-danger">Reportes eliminados</a>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                      <span class="glyphicon glyphicon-signal"></span> Graficos
                    </button>
                  </div>
                  <div class="pull-right">
                    <a href="registro.php" class="btn btn-sm btn-primary">Nuevo Registro</a>
                  </div>
                  <?php
                }
                ?>
                <br>
                <hr>
                <table id="lookup" class="table-bordered table-hover table-condensed" >
                  <thead  align="center" >
                    <tr>
                      <th>Index</th>
                      <th>Edificio</th>
                      <th>Usuario</th>
                      <th>IP </th>
                      <th>Serial</th>
                      <th>Telefono </th>
                      <th>Nombre</th>
                      <th>Marca</th>
                      <th>Teclado</th>
                      <th>Adaptador</th>
                      <th>RJ45</th>
                      <th>Monitor</th>
                      <th>nro_interno</th>
                      <th>Mouse</th>
                      <th>MAC</th>
                      <th>Antivirus</th>
                      <th>Impresora</th>
                      <th>Tinta</th>
                      <th>Tipo de tinta</th>
                      <?php
                      if($login_session == 'admin') {
                        ?>
                        <th class="text-center"> Acciones </th>
                        <?php
                      }
                      ?>

                    </tr>
                  </thead>

                </table>
                <!-- </div> -->

              </div>
            </div>
          </div>
          <!--/.content-->
        </div>
        <!--/.span9-->
      </div>
      <div class="clear"> </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Grafico de inventario</h4>
          </div>
          <div class="modal-body">
            <div >
              <p class="selector">
              <select onchange="setDataSet(this.options[this.selectedIndex].value);">
              <option value="config/data.php">Edificios</option>
              <option value="config/data2.php">Marcas</option>
              <option value="config/data3.php">Antivirus</option>
            </select> Selecione un Grafico
            </p>
              <div id="chartdiv" style="width: 100%; height: 400px;"></div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>


    <!--/.container-->

    <!--/.wrapper--><br />
    <?php
    include("vista/footer.php");
    ?>
    <script type="text/javascript" charset="utf-8" src="js/ajaxleso.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script> -->
    <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>
