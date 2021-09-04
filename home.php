<?php
include_once('php-model/Connection.php');

use Model\Connection;

session_start();

if (empty($_SESSION['s_id'])) {
    header('Location:login.php?msg=Anda%20Belum%20Login');
} else {
    $connection = Connection::get();
    $sql = 'SELECT * FROM users WHERE `id`=\''
        . $_SESSION['s_id'] . '\';';
    $result = Connection::get()
        ->query($sql)
        ->fetch_assoc();
    $username = $result['username'];
    Connection::close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
</head>

<body>
    <h2>Halo <?= strtoupper($username) ?></h2>
    <a href="logout.php">
        <button class="btn btn-danger">
            Logout&nbsp;<i class="fa fa-sign-in"></i>
        </button>
    </a>
</body>

</html>