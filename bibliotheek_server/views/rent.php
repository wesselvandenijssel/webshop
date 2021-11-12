<?php
require_once("../config/config.php");
session_start();
$user_name = $_SESSION['user_name'];
$id = $_GET["id"];
$sql = "SELECT * FROM users WHERE user_name='$user_name' ";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
        //  echo $id . $user_name;
	}
	
}
    $sql = "UPDATE `users` SET `bibliotheekid`= '$id' WHERE `user_name`= '$user_name'";
    // echo $sql;
    // echo $id;
    $result = mysqli_query($con, $sql);
    if($result){
        echo '<script type="text/javascript"> alert("Data Update")</script>';
        ?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href='assets/css/style.css' rel='stylesheet'>
<a href="return.php?id=<?php echo $id;?>"><button type="button" class="btn btn-primary">Return book</button></a>
<a href="../index.php?id=<?php echo $id;?>"><button type="button" class="btn btn-primary">Home</button></a>
<?php
    }
    else{
        echo '<script type="text/javascript"> alert("Data NOT Update")</script>';
    }
?>