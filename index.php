<?php
session_start();
require_once  'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . $base_url . "/resources/views/login/login.php");
}
?>

<!doctype html>
<html lang="nl">

<head>
    <title>wdv4toets</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

<?php require_once 'resources/views/components/header.php'; ?>

<?php
if (isset($_GET['msg'])) {
    echo "<div class='alert alert-primary' role='alert'>";
    echo $_GET['msg'];
    echo "</div>";
}
?>

<div class="addproduct"><a href="/resources/views/products/create.php">product toevoegen</a></div>

<div class="container">
    <div class="grid">

<?php

require_once 'config/conn.php';
$query = "SELECT * FROM products";
$statement = $conn->prepare($query);
$statement->execute([]);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as $product): ?>

    <div class="product">
        <img src="/public_html/img/<?php echo $product['image_name']?>" alt="Product 1">
        <h3><?php echo $product['name']?></h3>
        <p>Voorraad: <?php echo $product['supply']?></p>
        <p>€<?php echo $product['price']?></p>
        <p><a href="/resources/views/products/edit.php?id=<?php echo $product['id'] ?>">aanpassen</a></p>
        <p>
            <form action="<?php echo $base_url; ?>/App/http/controllers/productController.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                <input type="submit" value="Verwijder">
            </form>
        </p>
    </div>

<?php endforeach; ?>

    </div>
</div>

</body>

</html>
