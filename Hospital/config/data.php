<?php
//setting header to json
header('Content-Type: application/json');

//database
include "conn.php";

//query to get data from the table
$sql = "SELECT COUNT(EDIFICIO) as total,EDIFICIO FROM inventario GROUP BY EDIFICIO";
// $query = sprintf($sql);
//execute query
$result = $conn->query($sql);
//loop through the returned data
$data = array();
while($row  = mysqli_fetch_assoc($result)){
	$data[] = array(
		 'valor' => (float) $row['total'],
		 'Edificio' => $row['EDIFICIO']
	 );
}
// $data[] = array(
// 	 'value' => (float) $row['total'],
// 	 'category' => $row['EDIFICIO']
//  );

// $sql1 = "SELECT COUNT(*) as totalm,MARCA FROM inventario GROUP BY marca";
// $result1 = $conn->query($sql1);
// //loop through the returned data
// // $data1 = array();
// while($row1  = mysqli_fetch_assoc($result1)){
// 	$data[] = array(
// 		 'valor' => (float) $row1['totalm'],
// 		 'Edificio' => $row1['MARCA']
// 	 );
// }
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
