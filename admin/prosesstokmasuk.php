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
  $harga        = $_POST['harga'] * $_POST['qty'];
  $date         = $_POST['date'];
  $user_id      = $_SESSION['userid'];
  // var_dump($item_id,$type,$detail,$supplier_id,$qty,$date,$user_id);
  $query="INSERT INTO t_stock (item_id, type, detail, supplier_id, qty, harga, date, user_id) VALUES (
    '$item_id', 
    '$type', 
    '$detail', 
    '$supplier_id', 
    '$qty',
    '$harga',
    '$date',
    '$user_id')";
  if(empty($item_id) || empty($type) || empty($detail) || empty($qty) || empty($date) || empty($user_id)) 
  {
    
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
elseif(isset(($_POST['hapusstokmasuk'])))
    {
        $id = $_POST['id'];
        $item_id = $_POST['itemid'];
        $qty = $_POST['qty'];
        $query = "DELETE FROM t_stock WHERE stock_id = '$id'";
        // var_dump ($id,$item_id);

        if(mysqli_query($koneksi, $query))
        {
          $query1 = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$item_id'";
          mysqli_query($koneksi, $query1);
          echo"
          <script>alert('Data Berhasil Dihapus');
          window.location = 'stokmasuk.php';</script>
          ";
        }
        else
        {
          echo"
          <script>alert('Data Gagal Dihapus');
          window.location = 'stokmasuk.php';</script>
          ";
        }
    }

    elseif(isset(($_POST['barcode'])))
    {
        // include '../koneksi.php';
        $barcode = $_POST['barcode'];  //menangkap id yang disubmit

        //memilih semua data di tabel buku sesuai dengan id yang disubmit
        $query = mysqli_query($koneksi,"SELECT * FROM p_item WHERE barcode='$barcode'");
        $data1 = mysqli_fetch_array($query);
        $data = array(
            'item_id' => $data1['item_id'],
            'barcode' => $data1['barcode'],
            'name' => $data1['name'],
            'satuan' => $data1['unit_id'],
            'stock' => $data1['stock'],
        );
        echo json_encode($data); //menampilkan data json
    }
?>
