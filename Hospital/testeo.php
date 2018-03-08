<?php
$pero = "perro";
$gatu = "";
$cerdo = "cerdo";
$galli = "";
$escor  = "escorpión";
$mona = "mono";


$animales = array($pero, $gatu, $cerdo, $galli, $escor, $mona);
foreach ($animales as $animal =>$valor){
  if ($valor == "") {
    $valor = "nodata";

echo "$animal ";
// echo "$valor";
  }
}
// echo $conjunto_animales = implode(", ", $animales);
var_dump($animales);
 ?>
 <!doctype html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <?php include "head.php" ?>
   <title>attributeMultiple demo</title>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 </head>
 <body>

 <!-- <input id="man-news" name="man-news">
 <input name="milkman">
 <input id="letterman" name="new-letterman">
 <input name="newmilk">

 <script>
 $( "input[id]" ).val( "only this one" );
 </script>
 -->

 <div class="container">
<div class="text-center">
   <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#myForm"> Reservations
   </button>
</div>
<br>
<form class="collapse collapse-class" role="form" id="myForm">
   <div class="col-lg-2">
       <p>
           <input type="email" class="form-control">
       </p>
   </div>
   <div class="col-lg-2">
       <p>
           <input type="password" class="form-control">
       </p>
   </div>
   <div class="col-lg-2">
       <p>
           <input type="text" class="form-control">
       </p>
   </div>
   <div class="col-lg-2">
       <p>
           <input type="text" class="form-control">
       </p>
   </div>
   <div class="col-lg-2">
       <p>
           <input type="text" class="form-control">
       </p>
   </div>
   <div class="col-lg-2">
       <button type="submit" class="btn btn-default">Button</button>
   </div>
</form>
</div>

 </body>
 </html>
