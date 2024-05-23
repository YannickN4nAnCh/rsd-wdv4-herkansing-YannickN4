<?php

session_start();

require_once  '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . $base_url . "/resources/views/login/login.php");
}

?>
<!doctype html>
<html lang="nl">

<head>
    <title>wdv4toets</title>
    <?php require_once '../../../resources/views/components/head.php'; ?>
</head>

<body>

<?php require_once '../../../resources/views/components/header.php'; ?>

<div class="container">
    <h1>Product aanpassen</h1>
    <?php
    //Haal het id uit de URL:
    $id = $_GET['ids'];

    //1. Haal de verbinding erbij
    require_once '../../../config/conn.php';

    //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
    $query = "SELECT * FROM products WHERE id = :id";

    //3. Van query naar statement
    $statement = $conn->prepare($query);

    //4. Voer de query uit, voeg hier nog de placeholder toe
    $statement->execute([
    ":id" => $id
    ]);

    //5. Ophalen gegevens, tip: gebruik hier fetch().
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="<?php echo $base_url; ?>/app/Http/Controllers/productController.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $id;?>">

        <div class="form-group">
            <label for="productname">Naam product:</label>
            <input type="text" name="productname" id="productname" class="form-control w-25" value="<?php echo $product['name']; ?>">
        </div>

        <div class="form-group">
            <label for="price ">Prijs:</label>
            <input type="number" min="0" step="0.01" name="price" id="price" class="form-control w-25" value="<?php echo $product['price']; ?>">
        </div>

        <div class="form-group">
            <label for="supply">Op voorraad:</label>
            <input type="number" name="supply" id="supply" class="form-control w-25" value="<?php echo $product['supply']; ?>">
        </div>

        <div class="form-group">
            <label for="discount">korting:</label>
            <input type="number" min="0" name="discount" id="discount" class="form-control w-25" value="<?php echo $product['discount']; ?>">
        </div>

        <div class="form-group">
            <label for="imagename">Afbeelding naam:</label>
            <input type="text" name="imagename" id="imagename" class="form-control w-25" value="<?php echo $product['image_name']; ?>">
        </div>

        <input type="submit" value="Pas product aan" class="w-25">

    </form>
</div>

</body>

</html>
