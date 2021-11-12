<?php
require_once "../config/config.php";
if(isset($_POST['update'])){

    $id = $_GET['update'];
    $title = $_POST['title'];
    $author= $_POST['author'];
    $isbn13 = $_POST['isbn13'];
    $format = $_POST['format'];
    $publisher = $_POST['publisher'];
    $pages = $_POST['pages'];
    $dimensions= $_POST['dimensions'];
    $overview = $_POST['overview'];

    $sql = "UPDATE `bibliotheek` SET `title`= '$title',`author`='$author',`isbn13`='$isbn13',
    `format`='$format',`publisher`='$publisher',`pages`='$pages',
    `dimensions`='$dimensions',`overview`='$overview' WHERE `bibliotheekid`='$id'"  ;
    // echo $sql;
    // echo $id;
    // echo $title;
    $result = mysqli_query($con, $sql);
    if($result){
        echo '<script type="text/javascript"> alert("Data Update")</script>';
        header ("refresh:1;url=../index.php");
        echo "Redirecting.....";

    }
    else{
        echo '<script type="text/javascript"> alert("Data NOT Update")</script>';
    }
}
?>