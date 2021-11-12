<?php
    include('../config/db.php');
    include('../config/config.php')
?>
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

    <title>Bibliotheek</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src=".././assets/img/logo.png"></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mt-2">
                    <a href="../index.php" type="button" class="btn btn-primary">Home</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="../admin" type="button" class="btn btn-secondary">Admin CRUD</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="books.php" type="button" class="btn btn-secondary">My books</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="../index.php?logout" type="button" class="btn btn-warning">Logout</a>
                </li>
                <!-- <a href="index.php?logout">Logout</a> -->
            </ul>
            <?php
            ?>
        </div>
    </nav>
    <div class="container">
        <div class="card-group">
            <div class='row'>
                <?php
    $liqry = $con->prepare("SELECT user_id, user_name, user_email, bibliotheekid FROM users");
    if ($liqry === false) {
        echo mysqli_error($con);
    } else {
        $liqry->bind_result($user_id, $user_name, $user_email, $bibliotheekid);
        if ($liqry->execute()) {
            $liqry->store_result();
            while ($liqry->fetch()) { 
                if ($bibliotheekid == " ") {
                    $bibliotheekid = "No books";
                }
            }
                ?>
                <?php
        $liqry2 = $con->prepare("SELECT bibliotheek.bibliotheekid, bibliotheek.title, bibliotheek.author, bibliotheek.isbn13, bibliotheek.format, bibliotheek.publisher, bibliotheek.pages, bibliotheek.dimensions, bibliotheek.overview
        FROM users
        INNER JOIN bibliotheek ON users.bibliotheekid = bibliotheek.bibliotheekid");
        if ($liqry2 === false) {
            echo mysqli_error($con);
        } else {
            $liqry2->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
            if ($liqry2->execute()) {
                $liqry2->store_result();
                while ($liqry2->fetch()) { 
                    if ($pages == "") {
                        $pages = "undefined";
                    }
                }
            }
                
                    ?>

                <?php
                if ($isbn13 == ""){
                    ?>
                <div class="alert alert-danger" role="alert">
                    You don't have any books!
                </div>
                <?php
                }
                else{
                
                $locationonclick = "' onclick='location.href=\"return.php?id=" . $id . "\"'";
                ?>
                <div class='col-md-3 '>
                    <div class='mr-2'>
                        <div class="row">
                            <div class='card' <?php echo $locationonclick  ?>>
                                <!-- <img class='card-img-top' src='assets/img/product.png' alt='Card image cap'> -->
                                <div class='card-body'>
                                    <h5 class='card-title'><?php echo $title;?></h5>
                                    <p class='card-text'>Author: <?php echo $author;?></p>
                                    <p class="card-text">ISBN : <?php echo $isbn13;?></p>
                                    <p class='card-text'>Format: <?php echo $format;?></p>
                                    <p class='card-text'>Publisher: <?php echo $publisher;?></p>
                                    <p class='card-text'>Pages: <?php echo $pages;?></p>
                                    <p class='card-text'>Dimensions: <?php echo $dimensions;?></p>
                                    <p class='card-text'>Overview: <?php echo $overview;?></p>

                                    <div class='read-more-place'>
                                        <button class='btn btn-primary btn-default'><b>Return</b></button>
                                    </div>
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
        }

        $liqry->close();
    
    }
    ?>
            </div>
        </div>
    </div>
    <?php
    include "../include/footer.php";