<?php
include '../koneksi.php';
if(isset($_POST['simpanstokmasuk'])) {
  $idstokmasuk = $_POST['idstokmasuk'];
  $outlet = $_POST['outlet'];
  $tanggal = $_POST['tanggal'];
  $namaproduk = $_POST['namaproduk'];
  $jumlah = $_POST['jumlah'];
  $hargabeliperunit = $_POST['hargabeliperunit'];
  $totalhargabeli = $_POST['totalhargabeli'];
  foreach ($namaproduk as $key => $value) {
    $save = "INSERT INTO tb_inventori(idstokmasuk,outlet,tanggal,namaproduk,jumlah,hargabeliperunit,totalhargabeli) VALUES('".$idstokmasuk."','".$outlet."','".$tanggal."','".$value."','".$jumlah[$key]."','".$hargabeliperunit[$key]."','".$totalhargabeli[$key]."')";
    $query = mysqli_query($koneksi, $save);
  }
  header('location: stokmasuk.php');
}
?>
