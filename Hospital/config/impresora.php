<?php
include("conn.php");

$sql = "SELECT * FROM `impresora_contador` where  1";
$result = mysqli_query($conn, $sql);
if (!$result) {
  die("error data");
}else {
  $data = array();
  while ($data =mysqli_fetch_array($result)) {
    $arreglo["data"][] = $data;
  }
  echo json_encode($arreglo);
}
mysqli_free_result($result);
mysqli_close($conn);
 ?>
