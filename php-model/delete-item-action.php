<?php
include_once('Connection.php');

use Model\Connection;

if (empty($_GET)) {
    header('Location:../get-item.php?msg=pilih terlebih dahulu');
}

$mysql = Connection::get();
$sql = 'SELECT id FROM `items` WHERE id=\''
    . $_GET['id'] . '\';';
$result =$mysql->query($sql)->fetch_assoc();

if (is_null($result)) {
    Connection::close();
    header('Location:../get-item.php?msg=pilih terlebih dahulu');
}

$sql = 'DELETE FROM `items` WHERE id=\''
    . $_GET['id'] . '\';';
$mysql->query($sql);
Connection::close();
header('Location:../get-item.php?info=berhasil menghapus');

