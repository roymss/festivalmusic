<?php

require '../../inc/function.php';

$id = $_GET["id"];

if (hapusShop($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '../shop.php'
        </script>
";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = '../shop.php'
        </script>
";
}

?>