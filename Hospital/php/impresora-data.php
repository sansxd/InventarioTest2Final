<?php

include "../config/conn.php";

/* Database connection end */

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
0 => 'lugar_imp', //fue sacado para el index
1 => 'nombre_imp',
2 => 'cant_imp',
3 => 'ip_imp',
4 => 'n_serie',
5 => 'fecha',
6 => 'impresion',
7 => 'copia'

);

// obteniendo el total de numeros guardados sin ninguna búsqueda
$sql = "SELECT id_imprcopia,lugar_imp, nombre_imp,cant_imp,ip_imp,n_serie, fecha, impresion,copia\n"
    . "FROM impresora_contador\n"
    . "INNER JOIN impr_copias\n"
    . "ON impresora_contador.id_impresora = impr_copias.id_impresora";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
  $sql = "SELECT id_imprcopia,lugar_imp, nombre_imp,cant_imp,ip_imp,n_serie, fecha, impresion,copia\n"
      . "FROM impresora_contador\n"
      . "INNER JOIN impr_copias\n"
      . "ON impresora_contador.id_impresora = impr_copias.id_impresora";
	$sql.=" WHERE ";
	$sql.=" ( lugar_imp LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nombre_imp LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR cant_imp LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR ip_imp LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR n_serie LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR fecha LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR impresion LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR copia LIKE '%".$requestData['search']['value']."%' )";



	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

  $sql = "SELECT id_imprcopia,lugar_imp, nombre_imp,cant_imp,ip_imp,n_serie, fecha, impresion,copia\n"
      . "FROM impresora_contador\n"
      . "INNER JOIN impr_copias\n"
      . "ON impresora_contador.id_impresora = impr_copias.id_impresora";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die('Connect Error: ' . mysqli_connect_error());

}
// $start=$_REQUEST['start']+1;
$data = array();
// $counter = 1;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

	$nestedData[] = $row["lugar_imp"];
	$nestedData[] = $row["nombre_imp"];
	$nestedData[] = $row["cant_imp"];
	$nestedData[] = $row["ip_imp"];
	$nestedData[] = $row["n_serie"];
	$nestedData[] = $row["fecha"];
	$nestedData[] = $row["impresion"];
	$nestedData[] = $row["copia"];
  $nestedData[] = '<td>

	<form action="impr_edit.php" method="post" name="form_'.$row['id_imprcopia'].'">
	<input type="hidden" name="id_imprcopia" value="'.$row['id_imprcopia'].'">
	<button name="edit" value="Editar" type="sumbit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-edit"></span> Editar
        </button>
      <input type="hidden" name="id_imprcopia" value="'.$row['id_imprcopia'].'">
<button name="delete" value="Eliminar" type="sumbit" class="btn btn-default btn-sm" onclick="return confirm(\'Se borraran los datos de '.$row['nombre_imp'].'\');" formaction="impresoras.php" method="post" name="form_'.$row['id_imprcopia'].'>
				<span class="glyphicon glyphicon-remove"></span> Eliminar
			</button>
</form>

	</td>';
	$data[] = $nestedData;
 // $start++;

}



$json_data = array(
"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
"recordsTotal"    => intval( $totalData ),  // total number of records
"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
"data"            => $data   // total data array
);

echo json_encode($json_data);
// send data as json format
//onclick="getInventarioid('.$row['impresora_contador'].')"
//<a href="delete.php?action=delete&id='.$row['impresora_contador'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
?>
