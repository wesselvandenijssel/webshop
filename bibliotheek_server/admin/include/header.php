<?php
    include('config/db.php');
    include('config/config.php')
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
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a href="views/books.php" type="button" class="btn btn-secondary">My books</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="index.php?logout" type="button" class="btn btn-warning">Logout</a>
                </li>
                <!-- <a href="index.php?logout">Logout</a> -->
            </ul>
            <?php
            ?>
        </div>
</nav>