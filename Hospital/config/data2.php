<?php
//setting header to json
header('Content-Type: application/json');
//conexion
include "conn.php";



$sql1 = "SELECT COUNT(*) as totalm,MARCA FROM inventario GROUP BY marca";
$result1 = $conn->query($sql1);
//loop through the returned data
$data1 = array();
while($row1  = mysqli_fetch_assoc($result1)){
	$data1[] = array(
		 'valor' => (float) $row1['totalm'],
		 'Edificio' => $row1['MARCA']
	 );
}
$result1->close();
// $result1->close();
//close connection
$conn->close();

// $resultado = array();
// array_push($resultado,$data);
// array_push($resultado,$data1);
//free memory associated with result
print(json_encode($data1,JSON_NUMERIC_CHECK));
// print(json_encode($resultado));



//now print the data
// print(json_encode($data));

?>
