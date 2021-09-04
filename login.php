<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/register.css">
</head>

<body>
    <div class="container">
        <a href="index.html">
            <button class="float-right btn btn-success">
                Home&nbsp;<i class="fa fa-home"></i>
            </button>
        </a>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a href="register.php">
                            <button class="float-right btn btn-outline-primary">
                                Register&nbsp;<i class="fa fa-sign-in"></i>
                            </button>
                        </a>
                        <h2 class="card-title">Login</h2>
                    </div>
                    <div class="card-body">
                        <div id="alert-info">
                            <?php
                            if (!empty($_GET['msg'])) {
                                echo '<div class="alert alert-danger" role="alert">'
                                    . $_GET['msg'] . '</div>';
                            } else if (!empty($_GET['info'])) {
                                echo '<div class="alert alert-success" role="alert">'
                                    . $_GET['info'] . '</div>';
                            }
                            ?>
                        </div>
                        <form action="php-model/login-action.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Create Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login-validation.js"></script>

</body>

</html>