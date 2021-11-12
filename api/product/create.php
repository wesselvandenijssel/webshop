<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// database connection will be here
// include database and object files

include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object 
$product = new product($db);

// Filling data
// welcome data from form
$product->set_category_id($_GET['category_id']);
$product->set_naam($_GET['naam']);
$product->set_beschrijving($_GET['beschrijving']);
$product->set_prijs($_GET['prijs']);
// Run query
echo $product->create($product);
