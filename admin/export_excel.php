<?php
include_once("../plugins/xlsxwriter.class.php");
include "../koneksi.php";
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$waktu = date('d-m-Y_H.i.s', time());
$filename = "daftar_produk_" . $waktu . "_POS_System.xlsx";
header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');
$writer = new XLSXWriter();
$writer->setAuthor('Telaga');
$header = array(
    'No' => 'general',
    'Barcode' => 'string',
    'Nama (Wajib diisi)' => 'string',
    'Kategori' => 'string',
    'Satuan Barang' => 'string',
    'Harga Jual' => 'integer',
);
$wajib_diisi = array(['fill' => ''], ['fill' => '#fb5353'], ['fill' => ''], ['fill' => '#fb5353']);
// $freeze = array(['freeze_rows' => 1, 'freeze_columns' => 0]);
$writer->writeSheetHeader('Sheet1', $header, ['freeze_rows' => 1, 'freeze_columns' => 0]);
$query = "SELECT p_item.barcode, p_item.name, p_kategori.name AS kategori, p_satuanbarang.name AS satuan, p_item.price AS harga
        FROM p_item
        INNER JOIN p_kategori
        ON p_kategori.category_id=p_item.category_id
        INNER JOIN p_satuanbarang
        ON p_satuanbarang.unit_id=p_item.unit_id";
$result = mysqli_query($koneksi, $query);
$no = 1;
while ($data = mysqli_fetch_assoc($result)) {
    $writer->writeSheetRow('Sheet1', array($no++, $data['barcode'], $data['name'], $data['kategori'], $data['satuan'], $data['harga']));
}
$writer->writeToStdOut();
// $writer->writeToFile('daftar produk.xlsx');
//echo $writer->writeToString();
exit(0);
