<?php
include '../koneksi.php';
if (isset($_POST['simpankategori'])) {
    $namakategori   = $_POST['namakategori'];
    $kategori_id    = 3 . str_shuffle(date('dmyhis'));
    $query  = "INSERT INTO p_kategori(category_id,name) VALUES('$kategori_id','$namakategori')";
    $cek_kategori_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT category_id FROM p_kategori WHERE category_id='$kategori_id'"));
    if ($cek_kategori_id > 0) {
        $kategori_id_baru = 3 . str_shuffle(date('dmyhis'));
        $query1  = "INSERT INTO p_kategori(category_id,name) VALUES('$kategori_id_baru','$namakategori')";
        $result1 = mysqli_query($koneksi, $query1);
        $data1 = mysqli_affected_rows($koneksi);
        if ($data1 > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
    } else {
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_affected_rows($koneksi);
        if ($data > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
    }
    echo json_encode($params);
} elseif (isset($_POST['ubahkategori'])) {
    $id             = $_POST['id'];
    $namakategori   = $_POST['namakategori'];
    $updated        = date('Y-m-d H:i:s');

    $query = "UPDATE p_kategori SET 
        name    = '$namakategori',
        updated = '$updated'
        WHERE category_id = '$id'
        ";

    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Diubah');
            window.location = 'kategori.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahkategori.php';</script>
            ";
    }
} elseif (isset(($_POST['hapuskategori']))) {
    $id = $_POST['id'];
    $query = "DELETE FROM p_kategori WHERE category_id = '$id'";
    // var_dump($query);
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Dihapus');
            window.location = 'kategori.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Sedang digunakan di Produk  ');
            window.location = 'kategori.php';</script>
            ";
    }
} else {
    header('location: kategori.php');
}
