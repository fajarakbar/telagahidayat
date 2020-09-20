<?php
include '../koneksi.php';
if (isset($_POST['simpanoutlet'])) {
    $namaoutlet = $_POST['namaoutlet'];
    $alamat     = $_POST['alamat'];
    $telp       = $_POST['telp'];

    $query  = "INSERT INTO outlet(name,address,phone) VALUES('$namaoutlet','$alamat','$telp')";
    $result = mysqli_query($koneksi, $query);
    if (empty($namaoutlet)) {
        echo "
            <script>alert('Form wajib diisi');
            window.location = 'buatoutletbaru.php';
            </script>
            ";
    } elseif (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftaroutlet.php';
            </script>
            ";
    }
} elseif (isset($_POST['ubahoutlet'])) {
    $id         = $_POST['id'];
    $namaoutlet = $_POST['namaoutlet'];
    $alamat     = $_POST['alamat'];
    $telp       = $_POST['telp'];
    $updated    = date('Y-m-d H:i:s');

    $query = "UPDATE outlet SET 
        name    = '$namaoutlet',
        address = '$alamat',
        phone   = '$telp',
        updated = '$updated'
        WHERE outlet_id = '$id'
        ";

    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Diubah');
            window.location = 'daftaroutlet.php';
            </script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahoutlet.php';</script>
            ";
    }
} elseif (isset(($_POST['hapusoutlet']))) {
    $id = $_POST['id'];
    $query = "DELETE FROM outlet WHERE outlet_id = '$id'";
    // var_dump($query);
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Dihapus');
            window.location = 'daftaroutlet.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data barang masih ada');
            window.location = 'daftaroutlet.php';</script>
            ";
    }
} else {
    header('location: daftaroutlet.php');
}
