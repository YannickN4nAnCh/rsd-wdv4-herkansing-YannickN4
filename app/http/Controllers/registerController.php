<?php
session_start();

require_once  '../../../config/config.php';

if(isset($_SESSION['user_id']))
{
    die("Kan niet registreren - je bent al ingelogd");
}

$email = $_POST["username"];
$password = $_POST["password"];
$repeatPass = $_POST["password2"];
$name = $_POST["name"];

if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
    header("Location:" . $base_url . "/resources/views/login/register.php?msg=email is ongeldig");
}

if ((!empty($password) && !empty($repeatPass)) && $password == $repeatPass) {

    require_once '../../../config/conn.php';

    $query = "SELECT username FROM users where username = :username";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":username"=>$email
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result){
        header("Location:" . $base_url . "/resources/views/login/register.php?msg=email adres bestaat al");
        exit();
    }

    $hash_method = PASSWORD_DEFAULT;
    $hash = password_hash($password, $hash_method);
    $query = "INSERT INTO users (name, username, password) VALUES(:name, :username, :password)";
    $statement = $conn->prepare($query);

    $statement->execute([
        ":name" => $name,
        ":username" => $email,
        ":password" => $hash
    ]);
    header('Location:' . $base_url . '/resources/views/login/login.php');
    exit();

}
else {
    header("Location:". $base_url ."/resources/views/login/register.php?msg=wachtwoorden leeg of niet gelijk");
    exit();
}