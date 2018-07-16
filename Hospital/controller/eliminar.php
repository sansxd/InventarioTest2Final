<?php
include "config/conn.php";

if(isset($_POST['delete']) && $_POST['delete'] == 'Eliminar'){

  $id_delete = $_POST['ID_INVENTARIO']; //GET THE ID VIA URL
  $sqlquery = "SELECT * FROM inventario WHERE ID_INVENTARIO='$id_delete'";
  $sql = mysqli_query($conn, $sqlquery);
  if(mysqli_num_rows($sql) == 0){
    echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
  }else{
    $querydelete ="DELETE FROM inventario WHERE ID_INVENTARIO='$id_delete'";
    $delete = mysqli_query($conn, $querydelete);
    if($delete){
      echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
    }
  }
}if (isset($_POST['deletegnr']) && $_POST['deletegnr'] == 'Eliminar') {
  $id_delete = $_POST['ID']; //GET THE ID VIA URL
  $sqlquery = "SELECT * FROM inventario_publico WHERE ID='$id_delete'";
  $sql = mysqli_query($conn, $sqlquery);
  if(mysqli_num_rows($sql) == 0){
    echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
  }else{
    $querydelete ="DELETE FROM inventario_publico WHERE ID ='$id_delete'";
    $delete = mysqli_query($conn, $querydelete);
    if($delete){
      echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
    }
  }
}


?>
