<?php
include_once('Validation.php');
include_once('Connection.php');

use Model\Validation;
use Model\Connection;

Validation::validate($_POST, 'get-item');

$mysql = Connection::get();
$sql = 'SELECT id FROM `items` WHERE id=\''
    . $_POST['id'] . '\';';
$result =$mysql->query($sql)->fetch_assoc();

if (is_null($result)) {
    Connection::close();
    header('Location:../get-item.php?msg=pilih terlebih dahulu');
}

$sql = 'UPDATE `items` SET '
    . '`id_barang` = \'' . $_POST['nomorbarang'] . '\','
    . '`name` = \'' . $_POST['name'] . '\','
    . '`merk` = \'' . $_POST['merk'] . '\','
    . '`color` = \'' . $_POST['warna'] . '\','
    . '`qty` = \'' . $_POST['jumlah'] . '\''
    . 'WHERE `id` = \'' . $_POST['id'] . '\';';

$mysql->query($sql);
Connection::close();
header('Location:../get-item.php?info=Berhasil mengubah barang');
