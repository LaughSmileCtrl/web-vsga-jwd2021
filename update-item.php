<?php
include_once('php-model/Connection.php');

use Model\Connection;

if (empty($_GET)) {
    header('Location:get-item.php?msg=Pilih Barang Dulu');
}

$mysql = Connection::get();
$sql = 'SELECT id FROM `items` WHERE id=\''
    . $_GET['id'] . '\';';
$result = $mysql->query($sql)->fetch_assoc();

if (is_null($result)) {
    Connection::close();
    header('Location:get-item.php?msg=pilih terlebih dahulu');
} else {
    $sql = 'SELECT * FROM `items` WHERE id=\''
        . $_GET['id'] . '\';';
    $result = $mysql->query($sql)->fetch_assoc();
    Connection::close();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <a href="index.html">
            <button class="float-right btn btn-success">
                Home&nbsp;<i class="fa fa-home"></i>
            </button>
        </a>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Ubah barang</h2>
                    </div>
                    <div class="card-body">
                        <div id="alert-info">
                        </div>
                        <form action="php-model/update-item-action.php" method="POST">
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                            <div class="form-group row">
                                <label for="inputnomorbarang" class="col-sm-2 col-form-label">Nomor Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $result['id_barang'] ?>" name="nomorbarang" class="form-control" id="inputnomorbarang" placeholder="Nomor Barang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $result['name'] ?>" name="name" class="form-control" id="inputname" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputmerk" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $result['merk'] ?>" name="merk" class="form-control" id="inputmerk" placeholder="Merk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputwarna" class="col-sm-2 col-form-label">Warna</label>
                                <div class="col-sm-2">
                                    <input type="color" value="<?= $result['color'] ?>" name="warna" class="form-control" id="inputwarna" placeholder="Warna">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputjumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?= $result['qty'] ?>" name="jumlah" class="form-control" id="inputjumlah" placeholder="Jumlah">
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary btn-lg">Ubah Barang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>l