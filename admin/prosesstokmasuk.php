<?php
include '../koneksi.php';  
session_start();

if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
  header("Location: ../index.php");
  exit;
}
if ($_SESSION['level'] != '1') {
  header("Location: ../index.php");
  exit;
}
if(isset($_POST['simpanstokmasuk'])) {
  $item_id      = $_POST['item_id'];
  $type         = 'in';
  $detail       = $_POST['detail'];
  $supplier_id  = empty($_POST['supplier']) ? NULL : $_POST['supplier'];
  $qty          = $_POST['qty'];
  $date          = $_POST['date'];
  $user_id      = $_SESSION['userid'];
  // INSERT INTO `t_stock` (`item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES ('6', 'in', 'Dari gudang', NULL, '3', '2020-08-23', CURRENT_TIMESTAMP, '1');
  var_dump($supplier_id);
  $query="INSERT INTO t_stock (item_id, type, detail, supplier_id, qty, date, user_id) VALUES (
    '$item_id', 
    '$type', 
    '$detail', 
    '$supplier_id', 
    '$qty',
    '$date',
    '$user_id')";
  if(empty($item_id) || empty($type) || empty($detail) || empty($qty) || empty($date) || empty($user_id)) 
  {
    // var_dump($item_id,$type,$detail,$supplier_id,$qty,$date,$user_id);
    echo"
    <script>alert('Data Gagal Ditambahkan');
    window.location = 'buatstokmasukbaru.php';
    </script>
    ";
  }
  elseif(mysqli_query($koneksi, $query))
  {
    $query1 = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$item_id'";
    mysqli_query($koneksi, $query1);
    // var_dump ($query1);
    echo"
    <script>alert('Data Berhasil Ditambahkan');
    window.location = 'stokmasuk.php';
    </script>
    ";
  }
}
?>
