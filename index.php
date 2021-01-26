<?php
session_start();

require 'koneksi.php';

if (isset($_POST["username"])) {

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT  * FROM user WHERE username='$username' and password='$password'";
    $result = mysqli_query($koneksi, $sql) or die(mysqli_connect_error($koneksi));;

    $row = mysqli_fetch_assoc($result);
    if (mysqli_affected_rows($koneksi) > 0) {
        $_SESSION['username'] = $username;
        header("location:home.php");
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIAkademik:Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url("foto/bgi.jpg");
            position:fixed;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            background-size: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center" style="margin-top:150px">
            <div class="card bg-dark " style="width: 25rem;height: 23rem;">
                <div class="card-body ">
                    <h5 class="card-title text-center mt-4 mb-5 text-white font-weight-light" style="font-size:30px;">SILAHKAN LOGIN</h5>
                    <?php if (isset($error)) : ?>
                        <p style="color: red; font-style: italic;">username / password salah</p>
                    <?php endif; ?>

                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white" id="basic-addon1">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control border-left-0" type="text" name="username" size="40"  placeholder="username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white" id="basic-addon1">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input class="form-control border-left-0" type="password" name="password" size="40"  placeholder="password" required>
                        </div>
                        <!-- <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="username" required>
                        </div> -->
                        <!-- <div class="form-group mt-3">
                            <input name="password" type="password" class="form-control" placeholder="password" required>
                        </div> -->
                        <button type="submit" class="btn btn-info btn-lg btn-block mt-1 text-uppercase font-weight-bold" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>