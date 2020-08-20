<!DOCTYPE html>
<html>

<head>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <div class="container">
    <form class="insert-form" id="" method="post" action="">
      <hr>
      <h1 class="text-center">Dynamicaly add input field & insert data</h1>
      <hr>
      <div class="input-field">
        <table class="table table-bordered" id="table_field">
          <tr>
            <th>ID Stok Masuk</th>
            <th>Outlet</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga Beli Per Unit</th>
            <th>Total Harga Beli</th>
            <th>Add or Remove</th>
          </tr>
          <?php
$conn = mysqli_connect("localhost","root","","db_tokoretail");

if(isset($_POST['save'])) {
    $idstokmasuk = $_POST['idstokmasuk'];
    $outlet = $_POST['outlet'];
    $tanggal = $_POST['tanggal'];
    $namaproduk = $_POST['namaproduk'];
    $jumlah = $_POST['jumlah'];
    $hargabeliperunit = $_POST['hargabeliperunit'];
    $totalhargabeli = $_POST['totalhargabeli'];
    foreach ($namaproduk as $key => $value) {
        $save = "INSERT INTO inventori(idstokmasuk,outlet,tanggal,namaproduk,jumlah,hargabeliperunit,totalhargabeli) VALUES('".$idstokmasuk."','".$outlet."','".$tanggal."','".$value."','".$jumlah[$key]."','".$hargabeliperunit[$key]."','".$totalhargabeli[$key]."')";
        $query = mysqli_query($conn, $save);
    }
}
?>
          <tr>
            <td><input class="form-control" type="text" name="idstokmasuk" required></td>
            <td><input class="form-control" type="text" name="outlet" required></td>
            <td><input class="form-control" type="text" name="tanggal" required></td>
            <td><input class="form-control" type="text" name="namaproduk[]" required></td>
            <td><input class="form-control" type="text" name="jumlah[]" required></td>
            <td><input class="form-control" type="text" name="hargabeliperunit[]" required></td>
            <td><input class="form-control" type="text" name="totalhargabeli[]" required></td>
            <td><input class="btn btn-warning" type="button" name="addd" id="add" value="Add"></td>
          </tr>
        </table>
        <center>
          <input class="btn btn-warning" type="submit" name="save" id="save" value="Save Data">
        </center>
        <hr>
      </div>
    </form>
    <table class="table table-striped">
      <tr>
        <th>ID Stok Masuk</th>
        <th>Outlet</th>
        <th>Tanggal</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga Beli Per Unit</th>
        <th>Total Harga Beli</th>
      </tr>
      <?php
$select = "SELECT idstokmasuk, outlet,tanggal, COUNT(idstokmasuk) FROM inventori ORDER BY idstokmasuk DESC";
$result = mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['idstokmasuk']; ?></td>
        <td><?php echo $row['outlet']; ?></td>
        <td><?php echo $row['tanggal']; ?></td>
        <td><?php echo $row['namaproduk']; ?></td>
        <td><?php echo $row['jumlah']; ?></td>
        <td><?php echo $row['hargabeliperunit']; ?></td>
        <td><?php echo $row['totalhargabeli']; ?></td>
      </tr>
      <?php
}
?>
    </table>
  </div>

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      var html =
        '<tr><td><input class="form-control" type="text" name="idstokmasuk" required></td><td><input class="form-control" type="text" name="outlet" required></td><td><input class="form-control" type="text" name="tanggal" required></td><td><input class="form-control" type="text" name="namaproduk[]" required></td><td><input class="form-control" type="text" name="jumlah[]" required></td><td><input class="form-control" type="text" name="hargabeliperunit[]" required></td><td><input class="form-control" type="text" name="totalhargabeli[]" required></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';
      var x = 1;
      $("#add").click(function () {
        $("#table_field").append(html);
      });
      $("#table_field").on('click', '#remove', function () {
        $(this).closest('tr').remove();
      });
    });

  </script>
</body>

</html>
