<?php

$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040026");

// Query

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Tambah Performers

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama_performers"]);

    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO performers
                VALUES
                ('0', '$gambar', '$nama')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar_performers']['name'];
    $ukuranFile = $_FILES['gambar_performers']['size'];
    $tmpName = $_FILES['gambar_performers']['tmp_name'];
    $error = $_FILES['gambar_performers']['error'];

    // Cek Error

    if ($error === 4){
        echo "
        <script>
            alert('Silahkan pilih gambar terlebih dahulu!')
        </script>";
        return false;
    }

    // Cek apakah diupload adalah gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!')
        </script>";
        return false;
    }

    // Cek jika ukurannya terlalu besar

    if($ukuranFile > 3000000){
        echo "
        <script>
            alert('ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
    

    return $namaFileBaru;
}

// Tambah Shop

function tambahShop($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama_produk"]);
    $desk = htmlspecialchars($data["desk"]);
    $harga = htmlspecialchars($data["harga_produk"]);

    // Upload Gambar
    $gambar = uploadShop();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO shop
                VALUES
                ('0', '$nama', '$desk', '$harga', '$gambar')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadShop()
{

    $namaFile = $_FILES['gambar_produk']['name'];
    $ukuranFile = $_FILES['gambar_produk']['size'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];
    $error = $_FILES['gambar_produk']['error'];

    // Cek Error

    if ($error === 4){
        echo "
        <script>
            alert('Silahkan pilih gambar terlebih dahulu!')
        </script>";
        return false;
    }

    // Cek apakah diupload adalah gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!')
        </script>";
        return false;
    }

    // Cek jika ukurannya terlalu besar

    if($ukuranFile > 3000000){
        echo "
        <script>
            alert('ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, '../../assets/img/' . $namaFileBaru);
    

    return $namaFileBaru;
}


// Hapus Data


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM performers WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapusShop($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM shop WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// Ubah data

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_performers"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar_performers']['error']  === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE performers SET
                gambar_performers ='$gambar',
                nama_performers = '$nama'
              WHERE id = $id  
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahShop($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_produk"]);
    $desk = htmlspecialchars($data["desk"]);
    $harga = htmlspecialchars($data["harga_produk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar_produk']['error']  === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = uploadShop();
    }

    $query = "UPDATE shop SET
                nama_produk ='$nama',
                desk ='$desk',
                harga_produk ='$harga',
                gambar_produk = '$gambar'
              WHERE id = $id  
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Cari Data 

function cari($keyword)
{
    $query = "SELECT * FROM performers
                WHERE
              nama_performers LIKE '%$keyword%'
            ";
    return query($query);
}

function cariShop($keyword)
{
    $query = "SELECT * FROM shop
                WHERE
              nama_produk LIKE '%$keyword%'
            ";
    return query($query);
}
