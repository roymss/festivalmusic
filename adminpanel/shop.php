<?php

require '../inc/function.php';

if (isset($_POST["submit"])) {

    if (tambahShop($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = '../index.php'
        </script>
";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
            document.location.href = '../index.php'
        </script>
";
    }
}


$shop = query("SELECT * FROM shop");

if(isset($_POST["cari"])){
    $shop = cariShop($_POST["keyword"]);
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container d-flex">
            <a class="navbar-brand" href="#">Harmoni Fest</a>
            <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="adminpanel.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
            </ul>
            <form class="d-flex" action="#shop" role="search" method="POST">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger" type="submit" name="cari">Search</button>
            </form>
        </div>
    </nav>


    <!-- ADD -->
    <div class="container add-perf mb-3 p-2" id="#shop" style="margin-top: 110px;">
        <h1 class="text-center fonts">ADD NEW PRODUCT</h1>
        <form class="mt-5" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name Product</label>
                <input type="text" class="form-control" name="nama_produk" placeholder="Input Product Name Here">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price</label>
                <input type="text" class="form-control" name="harga_produk" placeholder="Input Price Name Here">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="desk" placeholder="Input Deskripsi Here">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Pict</label>
                <input type="file" name="gambar_produk" class="form-control">
            </div>
            <button class="btn btn-danger" name="submit">Add New Product</button>
        </form>
    </div>

    <!-- Table Shop -->

    <div class="container mt-4 border border-1 p-2 mb-3">
        <table class="w-100" cellpadding="11" cellspacing="0">

            <tr class="text-center">
                <th class="col-2">Product Image</th>
                <th class="col-2">Product Name</th>
                <th class="col-2">Deskripsi</th>
                <th class="col-4">Product Price</th>
                <th class="col-2">Action</th>
            </tr>
            <?php foreach ($shop as $sh) : ?>
                <tr class="text-center">
                    <td><img src="../assets/img/<?= $sh['gambar_produk']; ?>" alt="" width="80px" height="80px"></td>
                    <td><?= $sh['nama_produk']; ?></td>
                    <td><?= $sh['desk']; ?></td>
                    <td>Rp.<?= $sh['harga_produk']; ?></td>
                    <td>
                        <a class="btn btn-success" href="edit/updateshop.php?id=<?= $sh['id']; ?>">Update</a>
                        <a class="btn btn-danger" href="delete/shopdl.php?id=<?= $sh['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>
    <!-- Bootstrap JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>