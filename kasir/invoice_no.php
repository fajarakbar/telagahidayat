<?php
include '../koneksi.php';
session_start();
$outlet_id = $_SESSION['outlet_id'];
$date = date("ymd");
$query = "SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM t_sale WHERE (MID(invoice,3,6)) = '$date' AND outlet_id = '$outlet_id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
$row = $data['invoice_no'];
$n = ((int)$row) + 1;
$no = sprintf("%'.04d", $n);
$invoice = "T".$outlet_id . date('ymd') . $no;
echo '<span>' . $invoice . '</span>';
