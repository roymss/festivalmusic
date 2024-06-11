<?php

require '../../inc/function.php';

$id = $_GET['id'];

if (isset($_POST["submit"])) {

    if (ubahShop($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = '../shop.php'
        </script>
";
    } else {
        echo "
        <script>
            alert('Data gagal ubah');
            document.location.href = '../shop.php'
        </script>
";
    }
}

$shop = query("SELECT * FROM shop WHERE id = $id")[0];

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
    <title>Update Panel</title>
</head>

<body class="d-flex justify-content-center align-items-center w-100 vh-100">

    <div class="container border border-1 mt-2">

        <h2 class="text-center mt-3">UPDATE SHOP</h2>

        <div class="row mt-4 p-2">
            <form class="d-flex justify-content-center align-items-center flex-column gap-2" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $shop["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $shop["gambar_produk"]; ?>">
                <div class="col-12">
                    <input type="text" class="form-control" name="nama_produk" placeholder="Input Name Product" required value="<?= $shop["nama_produk"] ?>">
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" name="desk" placeholder="Input Deskripsi" required value="<?= $shop["desk"] ?>">
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" name="harga_produk" placeholder="Input Price" required value="<?= $shop["harga_produk"] ?>">
                </div>
                <div class="col-12">
                    <input type="file" class="form-control" name="gambar_produk" placeholder="Input Pict Product">
                </div>
                <button type="submit" name="submit" class="btn btn-danger mb-3 w-100">Update Product</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>




</html>