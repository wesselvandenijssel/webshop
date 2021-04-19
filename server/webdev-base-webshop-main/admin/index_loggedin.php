<?php
    include('core/header.php');
    include('core/checklogin_admin.php');
?>
<ul>
    <h1>Welkom <?php echo $_SESSION['Sadmin_email'];?></h1>
    <li><a href="users/">Gebruikers</a></li>
    <li><a href="orders/">Bestellingen</a></li>
    <li><a href="producten">Producten</a></li>
    <a href="logout.php">logout</a>
</ul>
<?php
    include('core/footer.php');
?>