<?php
include_once('Validation.php');
include_once('Connection.php');

use Model\Validation;
use Model\Connection;

Validation::validate($_POST, 'add-item');

$mysql = Connection::get();
$sql = 'INSERT INTO `items` (`id_barang`, `name`, `merk`, `color`, `qty`)'
    . 'VALUES (?, ?, ?, ?, ?);';
$stmt = $mysql->prepare($sql);
$stmt->bind_param(
    'ssssi',
    $_POST['nomorbarang'],
    $_POST['name'],
    $_POST['merk'],
    $_POST['warna'],
    $_POST['jumlah']
);

$stmt->execute();
Connection::close();
header('Location:../get-item.php?info=Berhasil Menambah barang');
