<?php
include "include/header.php";
// include the configs / constants for the database connection
// require_once("config/db.php");
// include "config/config.php";

// load the login class
require_once("classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // show you are logged in screen
    include("views/logged_in.php");

} else {
    // show you are not logged in screen
    include("views/not_logged_in.php");
}
include("include/footer.php");
?>

