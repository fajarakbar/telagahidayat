<?php
include "../koneksi.php";

?>
<table style="padding:20px" border="1" width="30%">
  <b style="padding:20px">Form Peminjaman Buku</b>
  <form action="" method="">
    <!--setiap inputyang berhubungan dengan script ajax wajib diberi tag id   -->
    <tr>
      <td><input name="barcode" id="barcode" onkeyup="autofill()"></td>
    </tr>
    <tr>
      <td><input name="nama" id="name" readonly></td>
    </tr>
    <tr>
      <td><input name="satuan" id="satuan" readonly></td>
    </tr>
    <tr>
      <td><input name="stock" id="stock" readonly></td>
    </tr>
  </form>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
<script>
function autofill() {
    var barcode = $('#barcode').val();
    $.ajax({
        url : 'cekbuku.php',
        data : 'barcode='+barcode,
    }).success(function(data){
        var json = data,
        obj = JSON.parse(json);
        $('#name').val(obj.name);
        $('#satuan').val(obj.satuan);
        $('#stock').val(obj.stock);
    });
}
</script>
