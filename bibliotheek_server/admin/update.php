<?php
include "include/header.php";
if (isset($_GET['update'])) {
    $edit = $_GET["update"];
    echo $edit;
}
else{
    echo "<div class='alert alert-danger' role='alert'>
    You are not changing anything!
  </div>";
}
$liqry = $con->prepare("SELECT bibliotheekid, title, author, isbn13, format, publisher, pages, dimensions, overview FROM bibliotheek WHERE bibliotheekid = '$edit'");       
if ($liqry === false) {
            echo mysqli_error($con);
        } else {
            $liqry->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
            if ($liqry->execute()) {
                $liqry->store_result();
                while ($liqry->fetch()) { 
                }
            }
        }
        
                    ?>
    <div id="frmRegistration">
        <form class="form-horizontal" action="update/update.php?update=<?php echo $edit;?>"method='POST'>
            <h1>Update book data</h1>
            <div class="form-group">

                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" id="title"
                        placeholder="Enter the title of your book" required value="<?php echo $title;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="author" >Author:</label>
                <div class="col-sm-6">
                    <input type="text" name="author" class="form-control" id="author" placeholder="author" required value="<?php echo $author;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="isbn13">Isbn:</label>
                <div class="col-sm-6">
                    <input type="number" name="isbn13" class="form-control" id="isbn13" placeholder="Enter isbn" required value="<?php echo $isbn13;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="format">format:</label>
                <div class="col-sm-6">
                    <input type="text" name="format" class="form-control" id="format" placeholder="format" required value="<?php echo $format;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="publisher">Publisher:</label>
                <div class="col-sm-6">
                    <input type="text" name="publisher" class="form-control" id="publisher" placeholder="publisher" required value="<?php echo $publisher;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pages">Pages:</label>
                <div class="col-sm-6">
                    <input type="number" name="pages" class="form-control" id="pages" placeholder="pages" required value="<?php echo $pages;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="dimensions">Dimensions:</label>
                <div class="col-sm-6">
                    <input type="text" name="dimensions" class="form-control" id="dimensions" placeholder="dimensions" required value="<?php echo $dimensions;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="overview">Overview:</label>
                <div class="col-sm-6">
                    <input type="text" name="overview" class="form-control" id="overview" placeholder="overview" required value="<?php echo $overview;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
<?php
include "../../include/footer.php";?>