<?php
include_once('vendor/autoload.php');
include_once('php-model/Connection.php');

use Model\Connection;

$mysql = Connection::get();

if ($mysql->connect_error) {
    $html_doc = new DOMDocument();
    $html_doc->loadHTMLFile('error.html');
    $html_doc->getElementById('content');
    echo $html_doc->saveHTML();
    die();
}
$sql =  'SELECT prov.id AS id, '
    . '      prov.nama AS provinsi, '
    . '      kab.nama AS kabupaten '
    . 'FROM wilayah_provinsi prov '
    . 'INNER JOIN wilayah_kabupaten kab '
    . 'ON prov.id = kab.provinsi_id;';

$result = $mysql->query($sql);
Connection::close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <style>
        table {
            text-align: center;
            border: 1px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.html">
            <button class="float-right btn btn-success">
                Home&nbsp;<i class="fa fa-home"></i>
            </button>
        </a>
        <nav class="navbar sticky-top navbar-light bg-light">
            <a class="navbar-brand" href="php-model/tospreadsheet.php">
                <button class="btn btn-primary">
                    Download Excel
                </button>
            </a>
        </nav>
        <div class="container">
            <table class="table table-striped" id="table-spreadsheet">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $n = 0;
                    $tmp = '';
                    foreach ($result as $r) {
                    ?>
                        <tr>
                            <td><?= $r['id'] ?></td>
                            <td><?= $r['provinsi'] ?></td>
                            <td><?= $r['kabupaten'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>