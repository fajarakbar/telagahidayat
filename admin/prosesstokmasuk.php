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

if (isset($_POST['simpanstokmasuk'])) {
  $item_id      = $_POST['item_id'];
  $type         = 'in';
  $detail       = empty($_POST['detail']) ? NULL : $_POST['detail'];
  $supplier_id  = empty($_POST['supplier']) ? NULL : $_POST['supplier'];
  $qty          = $_POST['qty'];
  $harga        = $_POST['harga'] * $_POST['qty'];
  $date         = $_POST['date'];
  $user_id      = $_SESSION['userid'];
  $outlet_id    = $_SESSION['outlet_id'];
  $stok_id      = 9 . str_shuffle(date('dmyhis'));
  $query = "SELECT * FROM p_item";
  $result = mysqli_query($koneksi, $query);
  $datajual = mysqli_fetch_assoc($result);
  $jual = $datajual['price'];
  if ($jual < $harga) {
    echo "
      <script>alert('Harga Jual Lebih Kecil Dari Harga Beli');
      window.location = 'buatstokmasukbaru.php';
      </script>
      ";
  } else {
    $query = "INSERT INTO t_stock (stock_id, item_id, type, detail, qty, harga, date, user_id, outlet_id) VALUES (
    '$stok_id',
    '$item_id', 
    '$type', 
    '$detail', 
    '$qty',
    '$harga',
    '$date',
    '$user_id',
    '$outlet_id')";
    $cek_stok_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT stock_id FROM t_stock WHERE stock_id='$stok_id'"));
    if ($cek_stok_id > 0) {
      $stok_id_baru = 9 . str_shuffle(date('dmyhis'));
      $query1 = "INSERT INTO t_stock ('stock_id, item_id, type, detail, qty, harga, date, user_id, outlet_id) VALUES (
      '$stok_id_baru',
      '$item_id', 
      '$type', 
      '$detail', 
      '$qty',
      '$harga',
      '$date',
      '$user_id',
      '$outlet_id')";
      if (empty($item_id) || empty($type) || empty($qty) || empty($date) || empty($user_id)) {
        echo "
      <script>alert('Form Wajib di Isi');
      window.location = 'buatstokmasukbaru.php';
      </script>
      ";
      } elseif (mysqli_query($koneksi, $query1)) {
        $query2 = "UPDATE p_item SET stock = stock + '$qty', beli = '$harga' / '$qty' WHERE item_id = '$item_id'";
        $result2 = mysqli_query($koneksi, $query2);
        echo "
      <script>alert('Data Berhasil Ditambahkan1');
      window.location = 'stokmasuk.php';
      </script>
      ";
      } else {
        mysqli_error($query);
        echo "
        <script>alert('Kondisi error');
        window.location = 'stokmasuk.php';
        </script>
        ";
      }
    } elseif (empty($item_id) || empty($type) || empty($qty) || empty($date) || empty($user_id)) {
      echo "
    <script>alert('Data Gagal Ditambahkan');
    window.location = 'buatstokmasukbaru.php';
    </script>
    ";
    } elseif (mysqli_query($koneksi, $query)) {
      $query3 = "UPDATE p_item SET stock = stock + '$qty', beli = '$harga' / '$qty' WHERE item_id = '$item_id'";
      $result3 = mysqli_query($koneksi, $query3);
      echo "
    <script>alert('Data Berhasil Ditambahkan');
    window.location = 'stokmasuk.php';
    </script>
    ";
    } else {
      mysqli_error($query);
      echo "
        <script>alert('Kondisi error2');
        window.location = 'stokmasuk.php';
        </script>
        ";
    }
  }
} elseif (isset(($_POST['hapusstokmasuk']))) {
  $id = $_POST['id'];
  $item_id = $_POST['itemid'];
  $qty = $_POST['qty'];
  $query = "DELETE FROM t_stock WHERE stock_id = '$id'";
  // var_dump ($id,$item_id);

  if (mysqli_query($koneksi, $query)) {
    $query1 = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$item_id'";
    mysqli_query($koneksi, $query1);
    echo "
          <script>alert('Data Berhasil Dihapus');
          window.location = 'stokmasuk.php';</script>
          ";
  } else {
    echo "
          <script>alert('Data Gagal Dihapus');
          window.location = 'stokmasuk.php';</script>
          ";
  }
} elseif (isset(($_POST['barcode']))) {
  $barcode  = $_POST['barcode'];  //menangkap id yang disubmit
  $outlet   = $_POST['outlet'];
  //memilih semua data di tabel buku sesuai dengan id yang disubmit
  $query = mysqli_query($koneksi, "SELECT *, p_item.name AS name_item, p_satuanbarang.name AS name_unit  FROM p_item INNER JOIN p_satuanbarang ON p_satuanbarang.unit_id = p_item.unit_id WHERE barcode='$barcode' AND outlet_id='$outlet'");
  $jmldata = mysqli_num_rows($query);
  if ($jmldata > 1) {
    $data1 = mysqli_fetch_array($query);
    $data = array(
      'success' => true,
    );
  } else {
    $data1 = mysqli_fetch_array($query);
    $data = array(
      'item_id' => $data1['item_id'],
      'barcode' => $data1['barcode'],
      'name' => $data1['name_item'],
      'satuan' => $data1['name_unit'],
      'stock' => $data1['stock'],
    );
  }
  echo json_encode($data); //menampilkan data json
} elseif (isset(($_POST['item_name']))) {
  $item_name  = $_POST['item_name'];  //menangkap id yang disubmit
  $outlet   = $_POST['outlet'];
  //memilih semua data di tabel buku sesuai dengan id yang disubmittuanbarang ON p_satuanbarang.unit_id = p_item.unit_id                                                                  WHERE p_item.name LIKE \'%gat%\' AND outlet_id=\'2\'";
  $query = mysqli_query($koneksi, "SELECT *, p_item.name AS name_item, p_satuanbarang.name AS name_unit  FROM p_item INNER JOIN p_satuanbarang ON p_satuanbarang.unit_id = p_item.unit_id WHERE p_item.name LIKE '%$item_name%' AND outlet_id='$outlet'");
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
