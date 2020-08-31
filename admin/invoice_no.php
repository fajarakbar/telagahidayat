<?php
include '../koneksi.php';
    $date = date("ymd");
    $query = "SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM t_sale WHERE (MID(invoice,3,6)) = '$date'";
    $result = mysqli_query($koneksi,$query);
    $data = mysqli_fetch_assoc($result);
    $row = $data['invoice_no'];
    $n = ((int)$row) + 1;
    $no = sprintf("%'.04d", $n);
    $invoice = "TP".date('ymd').$no;
    echo'<span>'.$invoice.'</span>';
?>
