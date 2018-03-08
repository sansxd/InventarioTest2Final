<?php
include("config/conn.php");
require_once 'controller/session.php';
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reporte</title>
  <?php include("head.php");?>

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
          if(isset($_GET['action']) == 'reinsert'){
            $id_reinsert = intval($_GET['id']);//VER EL TEMA DEL ($_GET['id']), de donde proviene
            $query = mysqli_query($conn, "SELECT * FROM delete_inventario WHERE ID_INVENTARIO='$id_reinsert'");
            if(mysqli_num_rows($query) == 0){
              echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            }else{
              $sqlreinsert="INSERT INTO Inventario (ID_INVENTARIO,EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO,MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA) SELECT ID_INVENTARIO, EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO,MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA FROM delete_inventario WHERE ID_INVENTARIO='$id_reinsert'";
              //aqui deberia hacer un insert en una nueva tabla con +1 atributo que tenga por valor date, para ver cuando fue eliminado
              $reinsert = mysqli_query($conn, $sqlreinsert);
              $delete = mysqli_query($conn, "DELETE FROM delete_inventario WHERE ID_INVENTARIO='$id_reinsert'");
              if($reinsert){
                echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
              }else{
                echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                echo("Error description: " . mysqli_error($conn));
              }
            }
          }
          ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="icon-user"></i> Reporte de datos eliminados</h3>
            </div>

            <div class="panel-body">

              <hr>


              <table id="adminreport" class="table-responsive table-bordered table-hover table-condensed nowrap " >
                <thead  class="thead-dark" align="center" >
                  <tr>

                    <th>ID</th>
                    <th>Dia Borrado</th>
                    <th>Edificio</th>
                    <th>Usuario</th>
                    <th>Marca </th>
                    <th>Serial</th>
                    <th>Telefono </th>
                    <th>Nombre</th>
                    <th>IP</th>
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
                    <th class="text-center"> Reinsertar </th>

                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <a href="administracion.php" class="btn btn-success">Volver</a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/.wrapper--><br />
      <div class="footer span-12">
        <div class="container">
          <b class="copyright"><a href="index.php"> Inventario Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b>
        </div>
      </div>


      <script type="text/javascript" charset="utf-8" src="js/data-borrado.js"></script>



</body>
</html>
