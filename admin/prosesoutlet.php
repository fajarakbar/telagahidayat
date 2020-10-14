<?php
include '../koneksi.php';
if (isset($_POST['simpanoutlet'])) {
    $namaoutlet = $_POST['namaoutlet'];
    $alamat     = $_POST['alamat'];
    $telp       = $_POST['telp'];
    $outlet_id  = 1 . str_shuffle(date('dmyhis'));
    $query  = "INSERT INTO outlet(outlet_id,name,address,phone) VALUES('$outlet_id','$namaoutlet','$alamat','$telp')";
    $cek_outlet_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT outlet_id FROM outlet WHERE outlet_id='$outlet_id'"));
    $cek_namaoutlet = mysqli_num_rows(mysqli_query($koneksi, "SELECT name FROM outlet WHERE name='$namaoutlet'"));

    if ($cek_outlet_id > 0) {
        $outlet_id_baru  = 1 . str_shuffle(date('dmyhis'));
        if ($cek_namaoutlet > 0) {
            echo "
            <script>alert('Nama Outlet Sudah Terdaftar');
            window.location = 'buatoutletbaru.php';
            </script>
            ";
        } else {
            $query1  = "INSERT INTO outlet(outlet_id,name,address,phone) VALUES('$outlet_id_baru','$namaoutlet','$alamat','$telp')";
            $result1 = mysqli_query($koneksi, $query1);
            echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftaroutlet.php';
            </script>
            ";
        }
    } elseif ($cek_namaoutlet > 0) {
        echo "
        <script>alert('Nama Outlet Sudah Terdaftar');
        window.location = 'buatoutletbaru.php';
        </script>
        ";
    } elseif (mysqli_query($koneksi, $query)) {
        echo "
        <script>alert('Data Berhasil Ditambahkan');
        window.location = 'daftaroutlet.php';
        </script>
        ";
    } else {
        mysqli_error($query);
        echo "
        <script>alert('Kondisi error');
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
