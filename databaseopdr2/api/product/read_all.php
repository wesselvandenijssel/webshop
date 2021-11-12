<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/words.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Words($db);
// read products will be here
// query products
$result = $product->read();
$num = $result->num_rows;
// check if more than 0 record found
if($num>0){
   // products array
   $products_arr=array();
   // product data ophalen
   $id = 0;
   while ($row = $result->fetch_assoc()){
       // extract row
       // this will make $row['name'] to
       // just $name only
       
       extract($row);
       $product_item=array(
           "id" => $id,
           "word" => html_entity_decode($word),
           "grace" => $grace,
           "checked" => $checked
       );
       array_push($products_arr, $product_item);
   }
   // set response code - 200 OK
   http_response_code(200);
   var_dump($products_arr);
   //echo($products_arr[0]['id']);
}
else{
   // set response code - 404 Not found
   http_response_code(404);
   // tell the user no products found
   echo json_encode(
       array("message" => "Geen producten gevonden")
   );
}