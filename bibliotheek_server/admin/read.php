<?php
require_once("config/config.php");
include "include/header.php";
require_once("classes/Login.php");
$login = new Login();
if ($login->isUserLoggedIn() == true) {
} else {
    include("views/not_logged_in.php");
}
?>
<div class="alert alert-success" role="alert">
    Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
    All books:
</div>

<div class="container">
    <div class="card-group">
        <div class='row'>
            <?php
        $liqry = $con->prepare("SELECT bibliotheekid, title, author, isbn13, format, publisher, pages, dimensions, overview FROM bibliotheek");
        if ($liqry === false) {
            echo mysqli_error($con);
        } else {
            $liqry->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
            if ($liqry->execute()) {
                $liqry->store_result();
                while ($liqry->fetch()) { 
                    if ($pages == "") {
                        $pages = "undefined";
                    }
                   
                    ?>
            <div class='col-md-3 '>
                <div class='mr-2'>
                    <div class="row">
                        <div class='card'>
                            <!-- <img class='card-img-top' src='assets/img/product.png' alt='Card image cap'> -->
                            <div class='card-body'>
                            <h5 class='card-title'>ID=<?php echo $id;?></h5>
                            <h5 class='card-title'><?php echo $title;?></h5>
                                    <p class='card-text'>Author: <?php echo $author;?></p>
                                    <p class="card-text">ISBN : <?php echo $isbn13;?></p>
                                    <p class='card-text'>Format: <?php echo $format;?></p>
                                    <p class='card-text'>Publisher: <?php echo $publisher;?></p>
                                    <p class='card-text'>Pages: <?php echo $pages;?></p>
                                    <p class='card-text'>Dimensions: <?php echo $dimensions;?></p>
                                    <p class='card-text'>Overview: <?php echo strip_tags($overview);?></p>
                            </div>
                            <!-- <div class='card-footer'>
                                    <small class='text-muted float-right'>dit zijn producten xD</small>
                                </div> -->
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <?php
                }
            }

            $liqry->close();
        }

        ?>
        </div>
    </div>
</div>
<?php
include("include/footer.php");
?>