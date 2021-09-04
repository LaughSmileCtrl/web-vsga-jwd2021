<?php
include_once('php-model/Connection.php');

use Model\Connection;

$sql = 'SELECT * FROM `items`;';
$result = Connection::get()->query($sql);

Connection::close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

    <style>
        .color {
            height: 3vh;
            width: 3vw;
        }

        .fa-trash,
        .fa-edit {
            color: #808080;
            font-size: 2vw;
        }

        .fa-trash:hover {
            color: red;
        }

        .fa-edit:hover {
            color: #61baff;
        }
    </style>
</head>

<body>
    <?php
    if (!empty($_GET['info'])) {
        echo '<div class="alert alert-success" role="alert">'
            . $_GET['info'] . '</div>';
    } else if (!empty($_GET['msg'])) {
        echo '<div class="alert alert-info" role="alert">'
            . $_GET['msg'] . '</div>';
    }
    ?>
    <div class="container">
        <a href="index.html">
            <button class="float-right btn btn-success">
                Home&nbsp;<i class="fa fa-home"></i>
            </button>
        </a>

        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nomor Barang</td>
                    <td>Name</td>
                    <td>Merk</td>
                    <td>Warna</td>
                    <td>Jumlah</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $d) {
                ?>
                    <tr>
                        <td><?= $d['id'] ?></td>
                        <td><?= $d['id_barang'] ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['merk'] ?></td>
                        <td>
                            <div class="color" style="background-color:<?= $d['color'] ?>">
                            </div>
                        </td>
                        <td><?= $d['qty'] ?></td>
                        <td>
                            <a href="php-model/delete-item-action.php?id=<?= $d['id'] ?>">
                                <i class="fa fa-trash"></i>
                            </a> &nbsp <a href="update-item.php?id=<?= $d['id'] ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </form>
            </tbody>
        </table>
    </div>
</body>

</html>l