<?php

require '../../inc/function.php';

$nama = $_GET['nama_produk'];

$buy = query("SELECT * FROM shop WHERE nama_produk = '$nama'");

?>


<!doctype html>
<html lang="en">

<head>
    <title>Buy</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
        .mt-6 {
            margin-top: 130px;
            margin-bottom: 130px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">Harmoni Fest</a>
            <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Produk -->


    <div class="container mt-6 d-flex">
        <?php foreach ($buy as $by) : ?>
            <div class="col-lg-5 bg-dark">
                <img src="../../assets/img/<?= $by['gambar_produk'] ?>" class="object-fit-cover" width="600px" height="400px" alt="">
            </div>
            <div class="col-lg-5 col-md-6 offset-lg-2">
                <h1><?= $by['nama_produk'] ?></h1>
                <p class="fs-5"><?= $by['desk'] ?>
                <p class="fs-3">Rp <?= $by['harga_produk'] ?></p>
                <button class="btn btn-danger ">Buy Now</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->

    <?php require 'footer.php' ?>

    <!-- Bootstrap JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>