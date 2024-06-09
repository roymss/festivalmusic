<?php

require '../inc/function.php';

include('add.php');

$performers = query("SELECT * FROM performers");

if(isset($_POST["cari"])){
    $performers = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css?<?= time() ?>">
    <title>Admin Panel</title>
</head>

<body>


    <!-- Navbar -->

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container d-flex">
            <a class="navbar-brand" href="../index.php">Harmoni Fest</a>
            <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="POST">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger" type="submit" name="cari">Search</button>
            </form>
        </div>
    </nav>

    <!-- Add -->

    <!-- Performers -->

    <?php include ('performers.php') ?>

    









    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>