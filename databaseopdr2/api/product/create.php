<?php
// required headers
header("Access-Control-Allow-Origin: *");
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
// query products
if (isset($_GET["create"])){
$result = $product->create();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>

<body>
    <form action="create.php" method='GET'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="word">word:</label>
            <div class="col-sm-6">
                <input type="text" name="word" class="form-control" id="word" placeholder="word" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="checked">checked:</label>
            <div class="col-sm-6">
                <input type="number" name="checked" class="form-control" id="checked" placeholder="checked" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="grace">grace:</label>
            <div class="col-sm-6">
                <input type="number" name="grace" class="grace" id="grace" placeholder="grace" required>
            </div>
        </div>
        <button type="submit" name="create" id="create" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>