<?php

include "../config/conn.php";

/* Database connection end */

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
0 => 'ID_INVENTARIO', //fue sacado para el index
1 => 'EDIFICIO',
2 => 'USUARIO',
3 => 'IP',
4 => 'SERIAL_PC',
5 => 'TELEFONO',
6 => 'NOMBRE',
7 => 'MARCA',
8 => 'TECLADO',
9 => 'ADAPTADOR',
10 => 'RJ45',
11 => 'MONITOR',
12 => 'N_INTERNO_INVENTARIO',
13 => 'MOUSE',
14 => 'MAC',
15 => 'ANTIVIRUS',
16 => 'IMPRESORA',
17 => 'TINTA',
18 => 'TIPODETINTA'
);

// obteniendo el total de numeros guardados sin ninguna búsqueda
$sql = "SELECT ID_INVENTARIO, EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO, MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA ";
$sql.=" FROM inventario";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM inventario";
	$sql.=" WHERE IP LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR USUARIO LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR EDIFICIO LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR TELEFONO LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR NOMBRE LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR MONITOR LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR TECLADO LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR MOUSE LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR SERIAL_PC LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR MARCA LIKE '".$requestData['search']['value']."%' ";
		$sql.=" OR MONITOR LIKE '".$requestData['search']['value']."%' ";


	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT ID_INVENTARIO, EDIFICIO,USUARIO, MARCA, SERIAL_PC, N_INTERNO_INVENTARIO, MONITOR,MOUSE,TECLADO,ADAPTADOR,RJ45,NOMBRE,TELEFONO,IP,MAC,ANTIVIRUS,IMPRESORA,TINTA,TIPODETINTA ";
	$sql.=" FROM inventario";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();
$counter = 1;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();
	$nestedData[] = "<td>" . $counter . "</td>";
	// $nestedData[] = $row["ID_INVENTARIO"];  //fue sacado para el index
	$nestedData[] = $row["EDIFICIO"];
	$nestedData[] = $row["USUARIO"];
	$nestedData[] = $row["IP"];
	$nestedData[] = $row["SERIAL_PC"];
	$nestedData[] = $row["TELEFONO"];
	$nestedData[] = $row["NOMBRE"];
	$nestedData[] = $row["MARCA"];
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

	<form action="editar.php" method="post" name="form_'.$row['ID_INVENTARIO'].'">
	<input type="hidden" name="ID_INVENTARIO" value="'.$row['ID_INVENTARIO'].'">
	<button name="edit" value="Editar" type="sumbit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-edit"></span> Editar
        </button>
</form>
<form onsubmit="return confirm(\'Esta seguro de borrar los datos de '.$row['NOMBRE'].'?\');" action="administracion.php" method="post" name="form_'.$row['ID_INVENTARIO'].'">
<input type="hidden" name="ID_INVENTARIO" value="'.$row['ID_INVENTARIO'].'">
<button name="delete" value="Eliminar" type="sumbit" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-remove"></span> Eliminar
			</button>
</form>
	</center>
	</td>';

	$data[] = $nestedData;
 $counter++; //increment counter by 1 on every pass

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
