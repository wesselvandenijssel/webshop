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
    <div id="products">
    <?php
$id = $_GET['upd'];
$productsql = "SELECT product.name AS productName, product.price, category.name AS categoryName, product_image.image AS photo, product.product_id FROM product INNER JOIN category ON product.category_id = category.category_id INNER JOIN product_image ON product_image.product_id = product.product_id WHERE category.active = 1 AND product.active = 1 AND product.product_id = $id ORDER BY RAND() ";

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
                    <a class='myButton' href='#'>Bestellen!</a>
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
</section><br>
</div>
<footer><br><br>
    <p>&copy; 2020 Wessel van den IJssel</p>
</footer>
    <?php
    include('../core/footer.php');
?>