<?php

$action = $_POST['action'];

if ($action == 'create') {

    $productname = $_POST['productname'];

    if (empty($productname)) {
        $errors[] = "Vul de product-naam in.";
    }

    $price = $_POST['price'];

    if (!is_numeric($price)) {
        $errors[] = "Vul voor de prijs een geldig getal in.";
    }

    $supply = $_POST['supply'];

    if (!is_numeric($supply)) {
        $errors[] = "Vul voor de voorraad een geldig getal in.";
    }

    $discount = $_POST['discount'];

    if (!is_numeric($discount)) {
        $errors[] = "Vul voor de korting een geldig getal in.";
    }

    $imagename = $_POST['imagename'];
    if (empty($imagename)) {
        $errors[] = "Vul de afbeelding naam in.";
    }

    if (isset($errors)) {
        var_dump($errors);
        die();
    }

    require_once '../../../config/conn.php';
    $query =    "INSERT INTO products (name, price, supply, discount, image_name) 
                    VALUES(:name, :price, :supply, :discount, :image_name)";
    $statement = $conn->prepare($query);

    header("Location:" . $base_url . "/index.php?msg=Product opgeslagen");
}

if ($action == 'edit') {

    $productname = $_POST['productname'];

    if(!isset($_POST['id'])) {
        $errors[] = "Geen product geselecteerd.";
    }
    else {
        $id = $_POST['id'];
    }

    if (empty($productname)) {
        $errors[] = "Vul de product-naam in.";
    }

    $price = $_POST['price'];

    if (!is_numeric($price)) {
        $errors[] = "Vul voor de prijs een geldig getal in.";
    }

    $supply = $_POST['supply'];

    if (!is_numeric($supply)) {
        $errors[] = "Vul voor de voorraad een geldig getal in.";
    }

    $discount = $_POST['discount'];

    if (!is_numeric($discount)) {
        $errors[] = "Vul voor de korting een geldig getal in.";
    }

    $imagename = $_POST['imagename'];
    if (empty($imagename)) {
        $errors[] = "Vul de afbeelding naam in.";
    }

    if (isset($errors)) {
        var_dump($errors);
        die();
    }

    require_once '../../../config/conn.php';
    $query = "
        UPDATE products
        SET name = :name,
            price = :price,
            supply = :supply,
            discount = :discount,
            image_name = :image_name
        WHERE id = :id;
    ";
    $statement = $conn->prepare($query);
    $test = $statement->execute([
        ":id" => $id,
        ":name" => $productname,
        ":supply" => $supply,
        ":discount" => $discount,
        ":image_name" => $imagename
    ]);

    header("Location:" . $base_url . "/index.php?msg=Product opgeslagen");
}

if ($action == 'delete') {

    $id = $_POST['id'];
    require_once '../../../config/conn.php';
    $query = "
        DELETE FROM prodducts
        WHERE id = :id
    ";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);
    header("Location:" . $base_url . "/index.php?msg=Product verwijderd");

}