<?php
include '../koneksi.php';
if (isset($_POST['simpansatuanbarang'])) {
    $namasatuanbarang   = $_POST['namasatuanbarang'];
    $unit_id            = 4 . str_shuffle(date('dmyhis'));
    $query  = "INSERT INTO p_satuanbarang(unit_id,name) VALUES('$unit_id','$namasatuanbarang')";
    $cek_unit_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT unit_id FROM p_satuanbarang WHERE unit_id='$unit_id'"));
    if ($cek_unit_id > 0) {
        $unit_id_baru = 4 . str_shuffle(date('dmyhis'));
        $query1  = "INSERT INTO p_satuanbarang(unit_id,name) VALUES('$unit_id_baru','$namasatuanbarang')";
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
} elseif (isset($_POST['ubahsatuanbarang'])) {
    $id                 = $_POST['id'];
    $namasatuanbarang   = $_POST['namasatuanbarang'];
    $updated            = date('Y-m-d H:i:s');

    $query = "UPDATE p_satuanbarang SET 
        name    = '$namasatuanbarang',
        updated = '$updated'
        WHERE unit_id = '$id'
        ";

    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Diubah');
            window.location = 'satuanbarang.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahsastuanbarang.php';</script>
            ";
    }
} elseif (isset(($_POST['hapussatuanbarang']))) {
    $id = $_POST['id'];
    $query = "DELETE FROM p_satuanbarang WHERE unit_id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Dihapus');
            window.location = 'satuanbarang.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data Gagal Dihapus');
            window.location = 'ubahsatuanbarang.php';</script>
            ";
    }
} else {
    header('location: satuanbarang.php');
}
