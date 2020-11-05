<?php
// ini_set('upload_max_filesize', '10240M');
// ini_set('post_max_size', '10240M');
// ini_set('memory_limit', '10240M');
// ini_set('max_input_time', '2592000');
// ini_set('max_execution_time', '2592000');
include('../koneksi.php');
session_start();
require '../vendor/autoload.php';

$user_id = $_SESSION['userid'];
$outlet = $_POST['outlet'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);

    if ('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    for ($i = 1; $i < count($sheetData); $i++) {
        if (($sheetData[$i]['2']) != null) {
            $item_id = 2 . str_shuffle(date('dmyhis'));
            $barcode = $sheetData[$i]['1'];
            $namaproduk = $sheetData[$i]['2'];
            $nama_kategori_excel = $sheetData[$i]['3'];
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM p_kategori WHERE name = '$nama_kategori_excel'"));
            $nama_kategori_db = $data['name'];
            if ($nama_kategori_db == $nama_kategori_excel) {
                #kategori yang tersimpan
                $kategori_id = $data['category_id'];
            } else {
                #buat kategori baru jika tidak tersimpan
                $kategori_id    = 3 . str_shuffle(date('dmyhis'));
                $query  = "INSERT INTO p_kategori(category_id,name) VALUES('$kategori_id','$nama_kategori_excel')";
                $cek_kategori_id_db = mysqli_num_rows(mysqli_query($koneksi, "SELECT category_id FROM p_kategori WHERE category_id='$kategori_id'"));
                if ($cek_kategori_id_db > 0) {
                    $kategori_id = 3 . str_shuffle(date('dmyhis'));
                    $query1  = "INSERT INTO p_kategori(category_id,name) VALUES('$kategori_id','$nama_kategori_excel')";
                    $result1 = mysqli_query($koneksi, $query1);
                } else {
                    $result = mysqli_query($koneksi, $query);
                }
            }
            $nama_satuan_barang_excel = $sheetData[$i]['4'];
            $unit = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM p_satuanbarang WHERE name = '$nama_satuan_barang_excel'"));
            $nama_satuan_barang_db = $unit['name'];
            if ($nama_satuan_barang_db == $nama_satuan_barang_excel) {
                #satuan barang yang tersimpan
                $satuan_barang_id = $unit['unit_id'];
            } else {
                #buat satuan barang baru jika tidak tersimpan
                $satuan_barang_id = 4 . str_shuffle(date('dmyhis'));
                $unit1  = "INSERT INTO p_satuanbarang(unit_id,name) VALUES('$satuan_barang_id','$nama_satuan_barang_excel')";
                $cek_unit_id_db = mysqli_num_rows(mysqli_query($koneksi, "SELECT unit_id FROM p_satuanbarang WHERE unit_id='$satuan_barang_id'"));
                if ($cek_unit_id_db > 0) {
                    $satuan_barang_id = 4 . str_shuffle(date('dmyhis'));
                    $unit2  = "INSERT INTO p_satuanbarang(unit_id,name) VALUES('$satuan_barang_id','$nama_satuan_barang_excel')";
                    $result1 = mysqli_query($koneksi, $unit2);
                } else {
                    $result = mysqli_query($koneksi, $unit1);
                }
            }
            $harga = $sheetData[$i]['5'];
            mysqli_query($koneksi, "INSERT INTO p_item (item_id,barcode,name,category_id,unit_id,price,user_id,outlet_id) VALUES (
                '$item_id',
                '$barcode',
                '$namaproduk',
                '$kategori_id',
                '$satuan_barang_id',
                '$harga',
                '$user_id',
                '$outlet')");
        }
    }
    header("Location: daftarproduk.php");
}
