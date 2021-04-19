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
$dbuser = "u200517_u200517";
$dbpass = "qAbG49AT";
$dbname = "u200517_webshop";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://u200517.gluweb.nl/webshop/");
define("BASEURL_CMS","http://u200517.gluweb.nl/webshop/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}