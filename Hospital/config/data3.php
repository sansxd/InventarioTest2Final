<?php
//setting header to json
header('Content-Type: application/json');
//conexion
include "conn.php";



$sql1 = "SELECT COUNT(ANTIVIRUS) as total, ANTIVIRUS FROM inventario GROUP BY ANTIVIRUS";
$result = $conn->query($sql1);
//loop through the returned data
$data1 = array();
while($row1  = mysqli_fetch_assoc($result)){
	$data1[] = array(
		 'valor' => (float) $row1['total'],
		 'Edificio' => $row1['ANTIVIRUS']
	 );
}
$result->close();
// $result->close();
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
