<?php
require_once "../config/config.php";
if(isset($_GET['delete'])){
    $sql = "DELETE FROM `bibliotheek` WHERE `bibliotheekid`='$id'"  ;
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