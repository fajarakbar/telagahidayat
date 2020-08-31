<?php
include '../koneksi.php';
$barcode = $_GET['barcode'];  //menangkap id yang disubmit

//memilih semua data di tabel buku sesuai dengan id yang disubmit
$query = mysqli_query($koneksi,"SELECT * FROM p_item WHERE barcode='$barcode'");
$data1 = mysqli_fetch_array($query);
$data = array(
    'name' => $data1['name'],
    'satuan' => $data1['unit_id'],
    'stock' => $data1['stock'],
);
echo json_encode($data); //menampilkan data json

?>