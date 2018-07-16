<?php
 if(isset($_POST['delete']) && $_POST['delete'] == 'Eliminar'){

    $id_delete = $_POST['id_imprcopia']; //GET THE ID VIA URL
    $sqlquery = "SELECT * FROM impr_copias WHERE id_imprcopia='$id_delete'";
    $sql = mysqli_query($conn, $sqlquery);
    if(mysqli_num_rows($sql) == 0){
      echo '<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    }else{
      $querydelete ="DELETE FROM impr_copias WHERE id_imprcopia='$id_delete'";
      $delete = mysqli_query($conn, $querydelete);
      if($delete){
        echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido eliminados correctamente.</div>';
      }else{
        echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
      }
    }
  }
   ?>
