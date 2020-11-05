<?php
include '../koneksi.php';
session_start();
require '../vendor/autoload.php';

if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
    header("Location: ../index.php");
    exit;
}
if ($_SESSION['level'] != '1') {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['simpanproduk'])) {
    $outlet         = $_POST['outlet'];
    $barcode        = $_POST['barcode'];
    $namaproduk     = $_POST['namaproduk'];
    $kategori       = $_POST['kategori'];
    $satuanbarang   = $_POST['satuanbarang'];
    $harga          = $_POST['harga'];
    $user_id        = $_SESSION['userid'];
    $item_id        = 2 . str_shuffle(date('dmyhis'));
    $query = "INSERT INTO p_item (item_id,barcode,name,category_id,unit_id,price,user_id,outlet_id) VALUES (
        '$item_id',
        '$barcode',
        '$namaproduk',
        '$kategori',
        '$satuanbarang',
        '$harga',
        '$user_id',
        '$outlet'
        )";
    $cek_item_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT item_id FROM p_item WHERE item_id='$item_id'"));
    $cek_namaitem = mysqli_num_rows(mysqli_query($koneksi, "SELECT name FROM p_item WHERE name='$namaproduk'"));
    if ($cek_item_id > 0) {
        $item_id_baru = 2 . str_shuffle(date('dmyhis'));
        if (empty($outlet) || empty($namaproduk) || empty($kategori) || empty($harga) || empty($kategori) || empty($satuanbarang)) {
            echo "
            <script>alert('Form Wajib di Isi');
            window.location = 'buatprodukbaru.php';
            </script>
            ";
        } elseif ($cek_namaitem > 0) {
            echo "
            <script>alert('Nama Produk Sudah Terdaftar');
            window.location = 'buatprodukbaru.php';
            </script>
            ";
        } else {
            $query1 = "INSERT INTO p_item (item_id,barcode,name,category_id,unit_id,price,user_id,outlet_id) VALUES (
                '$item_id_baru',
                '$barcode',
                '$namaproduk',
                '$kategori',
                '$satuanbarang',
                '$harga',
                '$user_id',
                '$outlet'
                )";
            $result1 = mysqli_query($koneksi, $query1);
            echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftarproduk.php';</script>
            ";
        }
    } elseif (empty($outlet) || empty($namaproduk) || empty($kategori) || empty($harga) || empty($kategori) || empty($satuanbarang)) {
        echo "
            <script>alert('Form wajib di Isi');
            window.location = 'buatprodukbaru.php';</script>
            ";
    } elseif ($cek_namaitem > 0) {
        echo "
        <script>alert('Nama Produk Sudah Terdaftar');
        window.location = 'buatprodukbaru.php';
        </script>
        ";
    } elseif (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftarproduk.php';</script>
            ";
    } else {
        mysqli_error($query);
        echo "
        <script>alert('Kondisi error');
        window.location = 'daftarproduk.php';
        </script>
        ";
    }
} elseif (isset($_POST['ubahproduk'])) {
    $id             = $_POST['id'];
    $barcode        = $_POST['barcode'];
    $namaproduk     = $_POST['namaproduk'];
    $kategori       = $_POST['kategori'];
    $satuanbarang   = $_POST['satuanbarang'];
    $harga          = $_POST['harga'];
    $updated        = date('Y-m-d H:i:s');

    $kategori_id    = 3 . str_shuffle(date('dmyhis'));
    $query = "UPDATE p_item SET
        barcode = '$barcode',
        name = '$namaproduk',
        category_id = '$kategori',
        unit_id = '$satuanbarang',
        price = '$harga',
        updated = '$updated'
        WHERE item_id = '$id'
        ";

    // var_dump($id,$barcode,$namaproduk,$kategori,$satuanbarang,$harga,$updated);
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Diubah');
            window.location = 'daftarproduk.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahproduk.php?id=$id';</script>
            ";
    }
} elseif (isset(($_POST['hapusproduk']))) {
    $id = $_POST['id'];
    $query = "DELETE FROM p_item WHERE item_id = '$id'";
    // var_dump($query);

    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Dihapus');
            window.location = 'daftarproduk.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Dihapus');
            window.location = 'daftarproduk.php';</script>
            ";
    }
}  else {
    header('location: daftarproduk.php');
}
