<?php
session_start();

/**
 * Voor de MAC gebruikers;
 */
//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "root";
//$dbname = "webshop";

/**
 * Voor de Windows gebruikers;
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webshop";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://localhost/database/webdev-base-webshop-main/");
define("BASEURL_CMS","http://localhost/database/webdev-base-webshop-main/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}