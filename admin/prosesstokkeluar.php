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

if(isset($_POST['simpanstokkeluar'])) {
  $item_id      = $_POST['item_id'];
  $type         = 'out';
  $detail       = empty($_POST['detail']) ? NULL : $_POST['detail'];
  $qty          = $_POST['qty'];
  $stock          = $_POST['stock'];
  $date         = $_POST['date'];
  $user_id      = $_SESSION['userid'];
  // var_dump($item_id,$type,$detail,$qty,$date,$user_id);
  $query="INSERT INTO t_stock (item_id, type, detail, qty, date, user_id) VALUES (
    '$item_id', 
    '$type', 
    '$detail', 
    '$qty',
    '$date',
    '$user_id')";
  if(empty($item_id) || empty($type) || empty($qty) || empty($date) || empty($user_id)) 
  {
    echo"
    <script>alert('Data Gagal Ditambahkan');
    window.location = 'buatstokkeluarbaru.php';
    </script>
    ";
  } elseif ($qty > $stock) {
    echo"
    <script>alert('Qty melebihi stok barang');
    window.location = 'buatstokkeluarbaru.php';
    </script>
    ";
  }
  elseif(mysqli_query($koneksi, $query))
  {
    $query1 = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$item_id'";
    mysqli_query($koneksi, $query1);
    // var_dump ($query1);
    echo"
    <script>alert('Data Berhasil Ditambahkan');
    window.location = 'stokkeluar.php';
    </script>
    ";
  }
  else{
    mysqli_query($koneksi, $query) or die(mysqli_error());
  }
}
elseif(isset(($_POST['hapusstokkeluar'])))
    {
        $id = $_POST['id'];
        $item_id = $_POST['itemid'];
        $qty = $_POST['qty'];
        $query = "DELETE FROM t_stock WHERE stock_id = '$id'";
        // var_dump ($id,$item_id);

        if(mysqli_query($koneksi, $query))
        {
          $query1 = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$item_id'";
          mysqli_query($koneksi, $query1);
          echo"
          <script>alert('Data Berhasil Dihapus');
          window.location = 'stokkeluar.php';</script>
          ";
        }
        else
        {
          echo"
          <script>alert('Data Gagal Dihapus');
          window.location = 'stokkeluar.php';</script>
          ";
        }
    }

    elseif(isset(($_POST['barcode'])))
    {
        // include '../koneksi.php';
        $barcode = $_POST['barcode'];  //menangkap id yang disubmit

        //memilih semua data di tabel buku sesuai dengan id yang disubmit
        $query = mysqli_query($koneksi,"SELECT *, p_item.name AS name_item, p_satuanbarang.name AS name_unit  FROM p_item INNER JOIN p_satuanbarang ON p_satuanbarang.unit_id = p_item.unit_id WHERE barcode='$barcode'");
        $data1 = mysqli_fetch_array($query);
        $data = array(
            'item_id' => $data1['item_id'],
            'barcode' => $data1['barcode'],
            'name' => $data1['name_item'],
            'satuan' => $data1['name_unit'],
            'stock' => $data1['stock'],
        );
        echo json_encode($data); //menampilkan data json
    }
?>
