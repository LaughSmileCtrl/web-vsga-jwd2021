<?php
include_once('Validation.php');
include_once('Connection.php');

use Model\Validation;
use Model\Connection;

Validation::validate($_POST, 'login');

$mysql = Connection::get();
$sql = 'SELECT * FROM `users` WHERE `username`=\''
    . $_POST['username'] . '\' AND `password`=\''
    . $_POST['password'] . '\';';
$result = $mysql->query($sql)->fetch_assoc();
Connection::close();

if (!is_null($result)) {
    session_start();
    $_SESSION['s_id'] = $result['id'];
    header('Location:../home.php');
} else {
    header('Location:../login.php?msg=akun tidak ditemukan');
}
