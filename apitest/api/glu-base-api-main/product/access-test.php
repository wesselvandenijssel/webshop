<?php
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/access.php';
// instantiate database and access object
$database = new Database();
$db = $database->getConnection();
// initialize object
$access = new Access($db);
// Verder met vaststellen: bestaat de apikey
$testwaarde = "e8636ea013e682faf61f56ce1cb1ab5c";
$resultaat = $access->validateAPIkey($testwaarde);
if($resultaat) {
   echo '<br>Hoera, de apikey bestaat';
}else{
   echo '<br>Oeps, niet de juiste waarde';
}