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

    <div class="container home loginform">
        <form action="/app/Http/Controllers/loginController.php" method="POST">
            <div class="form-group w-25">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group w-25">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="Login" class="submit-login w-25">
        </form>
    </div>
<?php
}
?>
</body>

</html>
