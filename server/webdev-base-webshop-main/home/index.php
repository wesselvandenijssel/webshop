<?php
    include('../core/header.php');
?>
<header>
    <div id="logo">
        <a href="../home"><img src="../assets/img/logo.png" alt="logo"></a>
    </div>
    <nav><br>
        <a href="../products">Products</a><br><br>
        <a href="../admin">Admin</a>
    </nav>
</header>
<div id="container">
    <section><br>
        <h2>Categorie:</h2>
        <ul>
            <?php
$sql = "SELECT name, description FROM category WHERE active = 1";
$liqry = $con->prepare($sql);
if($liqry === false) {
    echo mysqli_error($con);
} else{
    // $liqry->bind_param('s',$email);
    $liqry->bind_result($categoryName, $categoryDescription);
    if($liqry->execute()){
        $liqry->store_result();
        while($liqry->fetch()){
            ?>
            <article>
                <h3><li><a href="../products_cat?cat=<?php echo $categoryName;?>"><?php echo $categoryName;?></a></li></h3>
                <div><?php echo $categoryDescription;?></div>
            </article>
            <?php
        }
    }
    $liqry->close();
}
?>
        </ul>
    </section><br>
    <section>
        <h2>Een aantal producten:</h2>
        <div id="products">
            <?php
$productsql = "SELECT product.name AS productName, product.price, category.name AS categoryName, product_image.image AS photo, product.product_id FROM product INNER JOIN category ON product.category_id = category.category_id INNER JOIN product_image ON product_image.product_id = product.product_id WHERE category.active = 1 AND product.active = 1 ORDER BY RAND() LIMIT 3";

$productqry = $con->prepare($productsql);
if($productqry === false) {
    echo mysqli_error($con);
} else{
    $productqry->bind_result($productName, $productPrice, $categoryNameProduct, $photo, $productID);
    if($productqry->execute()){
        $productqry->store_result();
        while($productqry->fetch()){
            ?>
            <article>
                <h3><?php echo $productName;?></h3>
                <div>
                    <?php echo $categoryNameProduct;?><br>
                    &euro; <?php echo $productPrice;?>
                    <figure><img src='../assets/img/<?php echo $photo?>' alt='lamp'>
                <figcaption>
                <?php echo $productName;?> <br>
                    <a class='myButton' href='../details?upd=<?php echo $productID;?>'>Koop nu!</a>
                </figcaption>
            </figure>
            </article>
            <?php
        }
    }
    $productqry->close();
}
?>
            </div>
        <h2>Meer producten:</h2><br>
        <a href="../products" class="myButton">Products</a>
    </section><br>
</div>
<footer><br><br>
    <p>&copy; 2020 Wessel van den IJssel</p>
</footer>
<?php
    include('../core/footer.php');
?>