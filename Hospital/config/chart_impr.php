<?php
//setting header to json
header('Content-Type: application/json');

//database
include "conn.php";
if(isset($_POST['submit'])){
  //   $date = mysql_real_escape_string($_POST['date']);
  // $new_date = date('Y-m-d',strtotime($date));
  $id_impresora	= mysql_real_escape_string($_POST['myselectbox']);

}
$id_impresora ="contabilidad";
//query to get data from the table
$sql = "SELECT DISTINCT impresora_contador.nombre_imp AS nombre,fecha,\n"
    . " impresion,copia\n"
    . " FROM\n"
    . " impr_copias \n"
    . " INNER JOIN impresora_contador\n"
    . " on impr_copias.id_impresora = impresora_contador.id_impresora";
//execute query
$result = $conn->query($sql);
//loop through the returned data
$data = array();
while($row  = mysqli_fetch_assoc($result)){
	$data[] = array(
		 'nombre' => $row['nombre'],
     'Fecha' => $row['fecha'],
		 'Impresion' => $row['impresion'],
     'Copia' => $row['copia']
	 );
}
// $data[] = array(
// 	 'value' => (float) $row['total'],
// 	 'category' => $row['EDIFICIO']
//  );


$result->close();
//close connection
$conn->close();

// $resultado = array();
// array_push($resultado,$data);
// array_push($resultado,$data1);
//free memory associated with result
print(json_encode($data,JSON_NUMERIC_CHECK));
// print(json_encode($resultado));



//now print the data
// print(json_encode($data));

?>
