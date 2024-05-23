<?php
session_start();
require_once  '../../../config/config.php';

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
?>

<!doctype html>
<html lang="nl">

<head>
    <title>wdv4toets</title>
    <?php require_once '../../../resources/views/components/head.php'; ?>
</head>

<body>

<?php require_once '../../../resources/views/components/header.php';

if (isset($_SESSION['user_id'])) {
    header("Location: " . $base_url . "/index.php");
} else {
    ?>

    <?php
    if (isset($_GET['msg'])) {
        echo "<div class='alert alert-primary' role='alert'>";
        echo $_GET['msg'];
        echo "</div>";
    }
    ?>

    <div class="container home">
        <form action="/app/Http/Controllers/registerController.php" method="POST">
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" class="form-control w-25">
            </div>
            <div class="form-group">
                <label for="username">E-mail:</label>
                <input type="email" name="username" id="username" class="form-control w-25">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="form-control w-25">
            </div>
            <div class="form-group">
                <label for="password2">Herhaal wachtwoord:</label>
                <input type="password" name="password2" id="password2" class="form-control w-25">
            </div>
            <input type="submit" value="Registreer" class="w-25">
        </form>
    </div>
    <?php
}
?>
</body>

</html>
