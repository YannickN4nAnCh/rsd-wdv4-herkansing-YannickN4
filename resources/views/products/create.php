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
    <h1>Nieuw product</h1>

    <form action="<?php echo $base_url; ?>/app/Http/Controllers/productController.php" method="POST">
        <input type="hidden" name="action" value="create">

        <div class="form-group">
            <label for="productname">Naam product:</label>
            <input type="text" name="productname" id="productname" class="form-control w-25">
        </div>

        <div class="form-group">
            <label for="price ">Prijs:</label>
            <input type="number" min="0" step="0.01" name="price" id="price" class="form-control w-25">
        </div>

        <div class="form-group">
            <label for="supply">Op voorraad:</label>
            <input type="number" name="supply" id="supply" class="form-control w-25">
        </div>

        <div class="form-group">
            <label for="discount">korting:</label>
            <input type="number" min="0" name="discount" id="discount" class="form-control w-25">
        </div>

        <div class="form-group">
            <label for="imagename">Afbeelding naam:</label>
            <input type="text" name="imagename" id="imagename" class="form-control w-25">
        </div>

        <input type="submit" value="Maak product aan" class="w-25">

    </form>
</div>

</body>

</html>
