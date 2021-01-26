<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: forbidden.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>SIAkademik:Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
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
  <?php
  require "head.html";
  ?>
  <div class="utama">
    <div class="jumbotron mt-5 ml-5 mr-5 text-dark" style="border-radius: 10px; background-color:aliceblue">
      <div class="container ">
        <h1 class="display-2">Welcome...</h1>
        <p class="lead text-justify">Ini adalah Sistem Informasi Akademik sederhana yang dibuat untuk
        latihan menggunakan bahasa pemrograman php native.</p><br><br>
      </div>
    </div>
  </div>

</body>

</html>