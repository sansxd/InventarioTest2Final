<?php
include("config/conn.php");
// include('session.php');
require_once 'controller/session.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <script type="text/javascript">
window.onload = function(){
   document.getElementById('delete').onclick = function(e){
       alert(document.getElementById("borrar").value);
       return false;
   }
}
</script> -->
  <head>
    <?php include("head.php");?>
  </head>
  <body>
    <div class="navbar navbar-default">
      <div class="navbar-inner">
        <div class="container">
          <a class="navbar-brand" href="index.php">Inventario oficina Tic</a>
          <div class="pull-right">
            <a class="btn btn-primary btn-md" href="logout.php" role="button">Cerrar sesión</a>
          </div>
        </div>
      </div>
      <!-- /navbar-inner -->
    </div><br />

    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="content">
            <?php
            include('eliminar.php');
            // if(isset($_GET['action']) == 'delete'){
            //   $id_delete = intval($_GET['id']);//VER EL TEMA DEL ($_GET['id']), de donde proviene
            //   $query = mysqli_query($conn, "SELECT * FROM inventario WHERE ID_INVENTARIO='$id_delete'");
            //   if(mysqli_num_rows($query) == 0){
            //     echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            //   }else{
            //     $querydelete ="DELETE FROM inventario WHERE ID_INVENTARIO='$id_delete'";
            //     $delete = mysqli_query($conn, $querydelete);
            //     if($delete){
            //       echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
            //     }else{
            //       echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
            //     }
            //   }
            // }
            ?>


            <div class="panel panel-default">
              <div class="panel-heading">
                                <h3>Bienvenido :<a><?php echo $login_session; ?></a></h3>
              </div>

              <div class="panel-body">
                <div class="table-responsive">


                  <!-- <div class="pull-left">
                    <a href="exportar.php" class="btn btn-sm btn-primary">Exportar Ex</a>
                  </div> -->
                  <div class="pull-left">
                    <a href="reportes.php" class="btn btn-sm btn-danger">Reportes eliminados</a>
                  </div>
                  <div class="pull-right">
                    <a href="registro.php" class="btn btn-sm btn-primary">Nuevo Registro</a>
                  </div>
                  <br>

                  <hr>
                  <table id="lookup" class="table-bordered table-hover table-condensed " >
                    <thead  align="center" >
                      <tr>
                        <th>Index</th>
                        <!-- <th>ID</th>  fue sacado para el index-->
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
                        <th class="text-center"> Acciones </th>

                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

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
    <div class="footer span-12">
      <div class="container">
        <b class="copyright"><a href="index.php"> Inventario Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b>
      </div>
    </div>



    <script type="text/javascript" charset="utf-8" src="js/ajaxleso.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>



</body>
