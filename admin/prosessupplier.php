<?php
include '../koneksi.php';
if (isset($_POST['simpansupplier'])) {
    $namasupplier   = $_POST['namasupplier'];
    $notelepon      = $_POST['notelepon'];
    $alamat         = $_POST['alamat'];
    $catatan        = empty($_POST['catatan']) ? NULL : $_POST['catatan'];
    $supplier_id    = 5 . str_shuffle(date('dmyhis'));
    $query  = "INSERT INTO supplier(supplier_id,name,phone,address,description) VALUES(
            '$supplier_id',
            '$namasupplier',
            '$notelepon',
            '$alamat',
            '$catatan'
            )";
    $cek_supplier_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT supplier_id FROM supplier WHERE supplier_id='$supplier_id'"));
    if ($cek_supplier_id > 0) {
        $supplier_id_baru  = 1 . str_shuffle(date('dmyhis'));
        if (empty($namasupplier) || empty($notelepon) || empty($alamat)) {
            echo "
                <script>alert('Form Wajib di Isi');
                window.location = 'buatsupplierbaru.php';</script>
                ";
        } else {
            $query1  = "INSERT INTO supplier(supplier_id,name,phone,address,description) VALUES(
                '$supplier_id_baru',
                '$namasupplier',
                '$notelepon',
                '$alamat',
                '$catatan'
                )";
            $result1 = mysqli_query($koneksi, $query1);
            echo "
                <script>alert('Data Berhasil Ditambahkan');
                window.location = 'daftaroutlet.php';
                </script>
                ";
        }
    } elseif (empty($namasupplier) || empty($notelepon) || empty($alamat)) {
        echo "
            <script>alert('Form Wajib di Isi');
            window.location = 'buatsupplierbaru.php';</script>
            ";
    } elseif (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'suppliers.php';</script>
            ";
    } else {
        mysqli_error($query);
        echo "
        <script>alert('Kondisi error');
        window.location = 'supplier.php';
        </script>
        ";
    }
} elseif (isset($_POST['ubahsupplier'])) {
    $id             = $_POST['id'];
    $namasupplier   = $_POST['namasupplier'];
    $notelepon      = $_POST['notelepon'];
    $alamat         = $_POST['alamat'];
    $catatan        = empty($_POST['catatan']) ? NULL : $_POST['catatan'];
    $updated        = date('Y-m-d H:i:s');

    // var_dump($id,$namasupplier,$notelepon,$alamat,$catatan,$updated);
    $query = "UPDATE supplier SET
        name        = '$namasupplier',
        phone       = '$notelepon',
        address     = '$alamat',
        description = '$catatan',
        updated     = '$updated'
        WHERE supplier_id    = '$id'
        ";
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Diubah');
            window.location = 'suppliers.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahsupplier.php';</script>
            ";
    }
} elseif (isset(($_POST['hapussupplier']))) {
    $id = $_POST['id'];
    $query = "DELETE FROM supplier WHERE supplier_id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Dihapus');
            window.location = 'suppliers.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Dihapus');
            window.location = 'suppliers.php';</script>
            ";
    }
} else {
    header('location: suppliers.php');
}
