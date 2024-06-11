<div class="container add-perf mb-3 p-2">
    <h1 class="text-center fonts">ADD NEW PERFORMERS</h1>
    <form class="mt-5" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Name Performers</label>
            <input type="text" name="nama_performers" class="form-control" placeholder="Input Name Performers Here"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pict Performers</label>
            <input type="file" name="gambar_performers" class="form-control" required>
        </div>
        <button class="btn btn-danger" type="submit" name="submit">Add New Performers</button>
    </form>
</div>

<!-- Table Performers -->

<div class="container mt-4 border border-1 p-2 mb-3">
    <table class="w-100" cellpadding="11" cellspacing="0">

        <tr class="text-center">
            <th>Performers Image</th>
            <th>Performers Name</th>
            <th>Action</th>
        </tr>

        <?php foreach ($performers as $perf): ?>
            <tr class="text-center">
                <td><img src="../assets/img/<?= $perf["gambar_performers"] ?>" alt="" width="80px" height="80px"></td>
                <td><?= $perf["nama_performers"] ?></td>
                <td>
                    <a class="btn btn-success" href="update.php?id=<?= $perf["id"]; ?>">Update</a>
                    <a class="btn btn-danger" href="delete.php?id=<?= $perf["id"]; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</div>

<div class="container mb-5 mt-2">
    <a class="btn btn-danger text-center" href="#">Logout</a>
</div>