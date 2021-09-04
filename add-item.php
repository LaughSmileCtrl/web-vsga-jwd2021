<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
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
                        <h2 class="card-title">Tambah barang</h2>
                    </div>
                    <div class="card-body">
                        <div id="alert-info">
                        </div>
                        <form action="php-model/add-item-action.php" method="POST">
                            <div class="form-group row">
                                <label for="inputnomorbarang" class="col-sm-2 col-form-label">Nomor Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nomorbarang" class="form-control" id="inputnomorbarang" placeholder="Nomor Barang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputname" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputmerk" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="merk" class="form-control" id="inputmerk" placeholder="Merk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputwarna" class="col-sm-2 col-form-label">Warna</label>
                                <div class="col-sm-2">
                                    <input type="color" name="warna" class="form-control" id="inputwarna" placeholder="Warna" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputjumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" name="jumlah" class="form-control" id="inputjumlah" placeholder="Jumlah" required>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary btn-lg">Tambah Barang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>