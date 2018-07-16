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
  </head>
  <body>
    <div class="navbar-default">
      <div class="navbar-inner">
        <div class="container">
          <a class="navbar-brand" href="inventario_general.php">Inventario General</a>
          <div class="pull-right">

            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Inventarios <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="administracion.php">Informatica</a></li>
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
                if($login_session == 'admin' || $login_session =='contabilidad') {
                  ?>

                  <div class="pull-right">
                    <a href="registro_genral.php" class="btn btn-sm btn-primary">Nuevo Registro</a>
                  </div>
                  <?php
                }
                ?>
                <br>
                <hr>
                <table  class="display responsive nowrap" id="inventario_publico" >
  								<thead>
  									<tr>
                      <th>Index</th>
  										<th>Nombre Campo</th>
  										<th>Cod_Equipo</th>
  										<th>Tipo Equipo</th>
  										<th>Sigla</th>
  										<th>Marca</th>
  										<th>Modelo</th>
  										<th>Numero serie</th>
  										<th>Cod_Interno</th>
  										<th>Descripci&oacute;n</th>
  										<th>Empresa</th>
  										<th>&Aacute;rea</th>
  										<th>Ubicaci&oacute;n</th>
  										<th>Centro Costo</th>
  										<th>Cod_Usuario</th>
  										<th>Nombres</th>
  										<th>Ap_Paterno</th>
  										<th>Ap_Materno</th>
  										<th>Cod_Proveedor</th>
  										<th>Fecha Compra</th>
  										<th>N&deg; Factura</th>
  										<th>Valor Compra</th>
  										<th>Status</th>
  										<th>Est_Conserva</th>
  										<th>Grupo</th>
  										<th>Grupo_Descrip</th>
  										<th>SubGrupo</th>
  										<th>SubGrupo_Descrip</th>
  										<th>Cuenta</th>
  										<th>V_U_Financiera</th>
  										<th>Valor Libro a fin de a&ntilde;o</th>
  										<th>Valor Actualizado a fin de a&ntilde;o</th>
  										<th>Depreciaci&oacute;n Acumulada a fin de a&ntilde;o</th>
  										<th>Vida &Uacute;til Restante a fin de a&ntilde;o</th>
                      <?php
                      if($login_session == 'admin' || $login_session == 'contabilidad') {
                        ?>
                        <th class="text-center"> Acciones </th>
                        <?php
                      }
                      ?>
  									</tr>
  								</thead>
                  <tbody>
                  </tbody>
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



    <!--/.container-->

    <!--/.wrapper--><br />

    <script type="text/javascript" charset="utf-8" src="js/table.inventario_publico.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>








</body>

</html>
