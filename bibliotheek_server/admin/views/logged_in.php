<?php
// require_once("config/config.php");
?>
<div class="alert alert-success" role="alert">
    Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
    Edit:
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
                ?>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                while ($liqry->fetch()) { 
                    ?>
                <a class="dropdown-item" href="?id=<?php echo $id;?>"><?php echo $id;?></a>

                <?php
            }
?>
            </div>
            <nav class="nav flex-column">
                <?php
                if (isset($_GET['id'])) {
                    $edit = $_GET["id"];
                }
                if (isset($_GET['id'])) {
                ?>
                <p>Currently edditing: <?php echo $edit;?></p>
                <?php
                }
                ?>
                <a class="nav-link" href="create.php">Create</a>
                <a class="nav-link" href="read.php">Read</a>
                <a class="nav-link" href="update.php?update=<?php echo $edit;?>">Update</a>
                <a class="nav-link" href="delete/delete.php?delete=<?php echo $edit;?>">Delete</a>
            </nav>

            <?php
                }
            }

            $liqry->close();
        

        ?>
        </div>
    </div>
</div>