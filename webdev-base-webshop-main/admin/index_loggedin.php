<?php
    include('core/header.php');
    include('core/checklogin_admin.php');
?>
<ul>
    <li><a href="users/">Gebruikers</a></li>
    <li><a href="orders/">Bestellingen</a></li>
    <li><a href="producten">Producten</a></li>
    <a href="logout.php">logout</a>
</ul>
<?php
    include('core/footer.php');
?>