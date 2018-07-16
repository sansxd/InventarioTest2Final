<?php

include "../config/conn.php";

/* Database connection end */

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
	0 => 'ID_INVENTARIO',
	1=> 'DIA_BORRADO',
    2 => 'EDIFICIO',
		3 => 'USUARIO',
	4 => 'MARCA',
	5 => 'SERIAL_PC',
    6 => 'TELEFONO',
    7 => 'NOMBRE',
    8 => 'IP',
    9 => 'TECLADO',
    10 => 'ADAPTADOR',
    11 => 'RJ45',
    12 => 'MONITOR',
    13 => 'N_INTERNO_INVENTARIO',
    14 => 'MOUSE',
    15 => 'MAC',
    16 => 'ANTIVIRUS',
    17 => 'IMPRESORA',
    18 => 'TINTA',
    19 => 'TIPODETINTA'
);

// obteniendo el total de numeros guardados sin ninguna búsqueda
$sql = "SELECT ID_INVENTARIO, DIA_BORRADO,EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO, MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA ";
$sql.=" FROM delete_inventario";
$query=mysqli_query($conn, $sql) or die("ajax-grid-datadelete.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT ID_INVENTARIO,DIA_BORRADO, EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO, MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA ";
	$sql.=" FROM delete_inventario";
	$sql.=" WHERE ID_INVENTARIO LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR EDIFICIO LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR USUARIO LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR MARCA LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR SERIAL_PC LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR MONITOR LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR TECLADO LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR MOUSE LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR NOMBRE LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR TELEFONO LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR MONITOR LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR IP LIKE '".$requestData['search']['value']."%' ";



	$query=mysqli_query($conn, $sql) or die("ajax-grid-datadelete.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-datadelete.php: get PO"); // again run query with limit

} else {

  $sql = "SELECT ID_INVENTARIO,DIA_BORRADO, EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO, MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA ";
	$sql.=" FROM delete_inventario";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-datadelete.php: get PO");

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

	$nestedData[] = $row["ID_INVENTARIO"];
	$nestedData[] = $row["DIA_BORRADO"];
  $nestedData[] = $row["EDIFICIO"];
	$nestedData[] = $row["USUARIO"];
    $nestedData[] = $row["MARCA"];
	$nestedData[] = $row["SERIAL_PC"];
	$nestedData[] = $row["TELEFONO"];
    $nestedData[] = $row["NOMBRE"];
    $nestedData[] = $row["IP"];
    $nestedData[] = $row["TECLADO"];
    $nestedData[] = $row["ADAPTADOR"];
    $nestedData[] = $row["RJ45"];
    $nestedData[] = $row["MONITOR"];
    $nestedData[] = $row["N_INTERNO_INVENTARIO"];
    $nestedData[] = $row["MOUSE"];
    $nestedData[] = $row["MAC"];
    $nestedData[] = $row["ANTIVIRUS"];
    $nestedData[] = $row["IMPRESORA"];
    $nestedData[] = $row["TINTA"];
    $nestedData[] = $row["TIPODETINTA"];
		$nestedData[] = '<td><center>
<a href="reportes.php?action=reinsert&id='.$row['ID_INVENTARIO'].'" onclick="return confirm(\'Esta seguro de reinsertar los datos de '.$row['NOMBRE'].'?\')"  data-toggle="tooltip" title="Reinsertar" class="btn btn-md btn-info"> <i class="glyphicon glyphicon-repeat "></i> </a>
						 </center></td>';

	$data[] = $nestedData;

}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);

// send data as json format
//onclick="getInventarioid('.$row['ID_INVENTARIO'].')"
//<a href="delete.php?action=delete&id='.$row['ID_INVENTARIO'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
?>
