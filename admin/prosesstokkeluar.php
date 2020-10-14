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

if (isset($_POST['simpanstokkeluar'])) {
  $item_id      = $_POST['item_id'];
  $type         = 'out';
  $detail       = empty($_POST['detail']) ? NULL : $_POST['detail'];
  $qty          = $_POST['qty'];
  $stock          = $_POST['stock'];
  $date         = $_POST['date'];
  $user_id      = $_SESSION['userid'];
  $outlet_id    = $_SESSION['outlet_id'];
  $stok_id      = 9 . str_shuffle(date('dmyhis'));
  $query = "INSERT INTO t_stock (stock_id, item_id, type, detail, qty, date, user_id, outlet_id) VALUES (
    '$stok_id',
    '$item_id', 
    '$type', 
    '$detail', 
    '$qty',
    '$date',
    '$user_id',
    '$outlet_id')";
  $cek_stok_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT stock_id FROM t_stock WHERE stock_id='$stok_id'"));
  if ($cek_stok_id > 0) {
    $stok_id_baru = 9 . str_shuffle(date('dmyhis'));
    $query1 = "INSERT INTO t_stock (stock_id, item_id, type, detail, qty, date, user_id, outlet_id) VALUES (
      '$stok_id_baru',
      '$item_id', 
      '$type', 
      '$detail', 
      '$qty',
      '$date',
      '$user_id',
      '$outlet_id')";
    if (empty($item_id) || empty($type) || empty($qty) || empty($date) || empty($user_id)) {
      echo "
      <script>alert('Form Wajib di Isi');
      window.location = 'buatstokkeluarbaru.php';
      </script>
      ";
    } elseif ($qty > $stock) {
      echo "
      <script>alert('Qty melebihi stok barang');
      window.location = 'buatstokkeluarbaru.php';
      </script>
      ";
    } elseif (mysqli_query($koneksi, $query1)) {
      $query2 = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$item_id'";
      $result2 = mysqli_query($koneksi, $query2);
      echo "
      <script>alert('Data Berhasil Dikurangi');
      window.location = 'stokkeluar.php';
      </script>
      ";
    } else {
      mysqli_error($query);
      echo "
        <script>alert('Kondisi error');
        window.location = 'stokkeluar.php';
        </script>
        ";
    }
  } elseif (empty($item_id) || empty($type) || empty($qty) || empty($date) || empty($user_id)) {
    echo "
    <script>alert('Form Wajib di Isi');
    window.location = 'buatstokkeluarbaru.php';
    </script>
    ";
  } elseif ($qty > $stock) {
    echo "
    <script>alert('Qty melebihi stok barang');
    window.location = 'buatstokkeluarbaru.php';
    </script>
    ";
  } elseif (mysqli_query($koneksi, $query)) {
    $query3 = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$item_id'";
    $result3 = mysqli_query($koneksi, $query3);
    echo "
    <script>alert('Data Berhasil dikurangi');
    window.location = 'stokkeluar.php';
    </script>
    ";
  } else {
    mysqli_error($query);
    echo "
      <script>alert('Kondisi error');
      window.location = 'stokkeluar.php';
      </script>
      ";
  }
} elseif (isset(($_POST['hapusstokkeluar']))) {
  $id = $_POST['id'];
  $item_id = $_POST['itemid'];
  $qty = $_POST['qty'];
  $query = "DELETE FROM t_stock WHERE stock_id = '$id'";
  // var_dump ($id,$item_id);

  if (mysqli_query($koneksi, $query)) {
    $query1 = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$item_id'";
    mysqli_query($koneksi, $query1);
    echo "
          <script>alert('Data Berhasil Dihapus');
          window.location = 'stokkeluar.php';</script>
          ";
  } else {
    echo "
          <script>alert('Data Gagal Dihapus');
          window.location = 'stokkeluar.php';</script>
          ";
  }
} elseif (isset(($_POST['barcode']))) {
  // include '../koneksi.php';
  $barcode = $_POST['barcode'];  //menangkap id yang disubmit

  //memilih semua data di tabel buku sesuai dengan id yang disubmit
  $query = mysqli_query($koneksi, "SELECT *, p_item.name AS name_item, p_satuanbarang.name AS name_unit  FROM p_item INNER JOIN p_satuanbarang ON p_satuanbarang.unit_id = p_item.unit_id WHERE barcode='$barcode'");
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
