<?php
include_once('Validation.php');
include_once('Connection.php');

use Model\Validation;
use Model\Connection;

Validation::validate($_POST, 'register');

$mysql = Connection::get();
$sql = 'SELECT * FROM users WHERE `username`=\''
    . $_POST['username'] . '\';';
$result = $mysql->query($sql)->fetch_assoc();

if (is_null($result)) {
    $sql = 'INSERT INTO `users` (`username`, `password`)'
        . 'VALUES (?, ?);';
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param(
        'ss',
        $_POST['username'],
        $_POST['password']
    );
    $stmt->execute();
    Connection::close();
    header('Location:../login.php?info=Berhasil Membuat Akun');
} else {
    header('Location:../register.php?msg=Pilih Username Lain');
}
