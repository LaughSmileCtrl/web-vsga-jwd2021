<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
                        <a href="login.php">
                            <button class="float-right btn btn-outline-primary">
                                Login&nbsp;<i class="fa fa-sign-in"></i>
                            </button>
                        </a>
                        <h2 class="card-title">Register</h2>
                    </div>
                    <div class="card-body">
                        <div id="alert-info">
                            <?php
                            if (!empty($_GET['msg'])) {
                                echo '<div class="alert alert-danger" role="alert">'
                                    . $_GET['msg'] . '</div>';
                            }
                            ?>
                        </div>
                        <form onsubmit="return validateMe()" action="php-model/register-action.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Create Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="repass">Reenter Password</label>
                                <input type="password" name="repass" id="repass" class="form-control" placeholder="Reenter Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="show-password">
                                <label class="form-check-label" for="show-password">Show Password</label>
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary  btn-lg btn-block">Register</button>
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/popper.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/register-validation.js"></script>
</body>

</html>