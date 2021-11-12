<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='assets/css/style.css' rel='stylesheet'>
    <title>API</title>
</head>
<body>
    <?php
// required headers
header("Access-Control-Allow-Origin: *");
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
if(isset($_GET['delete'])){
    $result = $product->delete();
}
$result = $product->readUpdate();
    

if (isset($_POST["update"])){
    $result = $product->update();
    }
    if (isset($_GET['id'])) {
        $edit = $_GET["id"];
    }
    
    else{
        echo "<div class='alert alert-danger' role='alert'>
        You are not changing anything!
      </div>";
    }
$num = $result->num_rows;
// check if more than 0 record found
if($num>0){
   // products array
   $products_arr=array();
   // product data ophalen
   $id = 0;
   ?>
   <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
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
       ?>
                       <a class="dropdown-item" href="?delete=<?php echo $id;?>"><?php echo $id;?></a>
<?php
       //array_push($products_arr, $product_item);
   }
   ?>
   </div>
   <?php
                if (isset($_GET['delete'])) {
                    $edit = $_GET["delete"];
                }
                if (isset($_GET['delete'])) {
                ?>
                <p>Currently edditing: <?php echo $delete;?></p>
                <?php
                }
                ?>
   <?php
   // set response code - 200 OK
   http_response_code(200);
//    var_dump($products_arr);
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
?>
<script src="https://kit.fontawesome.com/41c29a8a8f.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
</body>
</html>