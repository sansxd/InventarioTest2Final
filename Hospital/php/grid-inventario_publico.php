<?php

include "../config/conn.php";

/* Database connection end */

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
// datatable column index  => database column name
0 =>'ID',
1 =>'nombre_campo',
2 =>'cod_equipo',
3 =>'tipo_equipo',
4 =>'sigla',
5 =>'marca',
6 =>'modelo',
7 =>'numero_serie',
8 =>'cod_interno',
9 =>'descripcion',
10 =>'empresa',
11 =>'area',
12 =>'ubicacin',
13 =>'centro_costo',
14 =>'cod_usuario',
15 =>'nombres',
16 =>'ap_paterno',
17 =>'ap_materno',
18 =>'cod_proveedor',
19 =>'fecha_compra',
20 =>'n_factura',
21 =>'valor_compra',
22 =>'status',
23 =>'est_cons',
24=>'grupo',
25=>'grupo_descrip',
26 =>'subgrp',
27 =>'subgrp_desc',
28 =>'cuenta',
29 =>'vu_finan',
30 =>'valor_libro',
31=>'valor_act',
32=>'depre_acu',
33 =>'vida_rest'
);

// obteniendo el total de numeros guardados sin ninguna búsqueda
$sql = "SELECT
`ID`,
`nombre_campo`,
`cod_equipo`,
`tipo_equipo`,
`sigla`,
`marca`,
`modelo`,
`numero_serie`,
`cod_interno`,
`descripcion`,
`empresa`,
`area`,
`ubicacin`,
`centro_costo`,
`cod_usuario`,
`nombres`,
`ap_paterno`,
`ap_materno`,
`cod_proveedor`,
`fecha_compra`,
`n_factura`,
`valor_compra`,
`status`,
`est_cons`,
`grupo`,
`grupo_descrip`,
`subgrp`,
`subgrp_desc`,
`cuenta`,
`vu_finan`,
`valor_libro`,
`valor_act`,
`depre_acu`,
`vida_rest`";
$sql.=" FROM
`inventario_publico`";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM inventario_publico";
	$sql.=" WHERE tipo_equipo LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR cod_equipo LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR nombre_campo LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR marca LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR modelo LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR numero_serie LIKE '%".$requestData['search']['value']."%' ";
		$sql.=" OR cod_interno LIKE '%".$requestData['search']['value']."%' ";
		$sql.=" OR sigla LIKE '%".$requestData['search']['value']."%' ";
		$sql.=" OR nombres LIKE '%".$requestData['search']['value']."%' ";
		$sql.=" OR ap_paterno LIKE '%".$requestData['search']['value']."%' ";
		$sql.=" OR ap_materno LIKE '%".$requestData['search']['value']."%' ";


	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql.=" FROM inventario_publico";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die('Connect Error: ' . mysqli_connect_error());

}
$start=$_REQUEST['start']+1;
$data = array();
// $counter = 1;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();
	$nestedData[] = "<td>" . $start . "</td>";
	// $nestedData[] = $row["ID"];  //fue sacado para el index
	$nestedData[] = $row["nombre_campo"];
	$nestedData[] = $row["cod_equipo"];
	$nestedData[] = $row["tipo_equipo"];
	$nestedData[] = $row["sigla"];
	$nestedData[] = $row["marca"];
	$nestedData[] = $row["modelo"];
	$nestedData[] = $row["numero_serie"];
	$nestedData[] = $row["cod_interno"];
	$nestedData[] = $row["descripcion"];
	$nestedData[] = $row["empresa"];
	$nestedData[] = $row["area"];
	$nestedData[] = $row["ubicacin"];
	$nestedData[] = $row["centro_costo"];
	$nestedData[] = $row["cod_usuario"];
	$nestedData[] = $row["nombres"];
	$nestedData[] = $row["ap_paterno"];
	$nestedData[] = $row["ap_materno"];
	$nestedData[] = $row["cod_proveedor"];
	$nestedData[] = $row["fecha_compra"];
	$nestedData[] = $row["n_factura"];
	$nestedData[] = $row["valor_compra"];
	$nestedData[] = $row["status"];
	$nestedData[] = $row["est_cons"];
	$nestedData[] = $row["grupo"];
	$nestedData[] = $row["grupo_descrip"];
	$nestedData[] = $row["subgrp"];
	$nestedData[] = $row["subgrp_desc"];
	$nestedData[] = $row["cuenta"];
	$nestedData[] = $row["vu_finan"];
	$nestedData[] = $row["valor_libro"];
	$nestedData[] = $row["valor_act"];
	$nestedData[] = $row["depre_acu"];
	$nestedData[] = $row["vida_rest"];

	$nestedData[] = '<td><center>

	<form action="editar_genral.php" method="post" name="form_'.$row['ID'].'">
	<input type="hidden" name="ID" value="'.$row['ID'].'">
	<button name="edit" value="Editar" type="sumbit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-edit"></span> Editar
        </button>
</form>
<form onsubmit="return confirm(\'Esta seguro de borrar los datos de '.$row['nombres'].'?\');" action="inventario_general.php" method="post" name="form_'.$row['ID'].'">
<input type="hidden" name="ID" value="'.$row['ID'].'">
<button name="deletegnr" value="Eliminar" type="sumbit" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-remove"></span> Eliminar
			</button>
</form>
	</center>
	</td>';

	$data[] = $nestedData;
 // $counter++; //increment counter by 1 on every pass
 $start++;

}



$json_data = array(
"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
"recordsTotal"    => intval( $totalData ),  // total number of records
"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
"data"            => $data   // total data array
);

echo json_encode($json_data);
