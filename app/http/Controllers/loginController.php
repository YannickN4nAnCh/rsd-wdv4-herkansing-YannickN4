<?php

session_start();
require_once  '../../../config/config.php';
$username = $_POST['username'];
$password = $_POST['password'];

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "
        SELECT * FROM USERS WHERE username = :username
    ";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":username" => $username
]);

//5. Retrieve data
$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() > 1)
{
    header("Location:" . $base_url . "/resources/views/login/login.php?msg=accountgegevens onjuist");
    exit();
}

if(!password_verify($password, $user['password']))
{
    header("Location:" . $base_url . "/resources/views/login/login.php?msg=accountgegevens onjuist");
    exit();
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
header("Location: ../../../index.php");