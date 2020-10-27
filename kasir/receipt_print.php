<?php
session_start();
include "../koneksi.php"; //cek apakah sudah login
$outlet_id = $_SESSION['outlet_id'];

if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
  header("Location: ../index.php");
  exit;
}
if ($_SESSION['level'] != '2') {
  header("Location: ../index.php");
  exit;
}

require __DIR__ . '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector; //untuk printer usb
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector; //untuk printer jaringan
use Mike42\Escpos\Printer;

try {
  // $connector = null; //untuk printer usb
  $connector = new NetworkPrintConnector("192.168.137.201", 9100); //untuk printer jaringan
  // $connector = new WindowsPrintConnector("Receipt Printer");//untuk printer usb
  $printer = new Printer($connector);
  $printer->setJustification(Printer::JUSTIFY_CENTER);

  // membuat fungsi untuk membuat 1 baris tabel, agar dapat dipanggil berkali-kali dgn mudah
  function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4)
  {
    // Mengatur lebar setiap kolom (dalam satuan karakter)
    $lebar_kolom_1 = 12;
    $lebar_kolom_2 = 8;
    $lebar_kolom_3 = 8;
    $lebar_kolom_4 = 9;

    // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
    $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
    $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
    $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
    $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);

    // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
    $kolom1Array = explode("\n", $kolom1);
    $kolom2Array = explode("\n", $kolom2);
    $kolom3Array = explode("\n", $kolom3);
    $kolom4Array = explode("\n", $kolom4);

    // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
    $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));

    // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
    $hasilBaris = array();

    // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
    for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

      // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
      $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
      $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

      // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
      $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
      $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);

      // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
      $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
    }

    // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
    // return implode($hasilBaris, "\n") . "\n";
    return implode($hasilBaris) . "\n";
  }

  // Membuat judul
  $printer->initialize();

  $printer->setPrintLeftMargin(20);
  $printer->selectPrintMode(Mike42\Escpos\Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
  $printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
  $toko = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM outlet WHERE outlet_id='$outlet_id'"));
  $printer->text("Toko " . $toko['name'] . "\n");
  $printer->setFont(Mike42\Escpos\Printer::FONT_B);
  $printer->text($toko['address'] . "\n");
  $printer->text("\n");

  $sale_id = $_GET['sale_id'];
  $query4 = "SELECT t_sale.invoice, t_sale.customer_id, t_sale.total_price, t_sale.discount, t_sale.final_price, t_sale.cash, t_sale.remaining, t_sale.note, t_sale.date, t_sale.user_id, t_sale.created AS sale_created, user.username AS user_name 
    FROM t_sale 
    INNER JOIN user ON t_sale.user_id=user.user_id 
    WHERE t_sale.sale_id = '$sale_id'";
  $result = mysqli_query($koneksi, $query4);
  $data = mysqli_fetch_assoc($result);

  // Data transaksi
  $printer->initialize();
  $printer->text("No Transaksi : " . $data['invoice'] . "\n");
  $printer->text("Kasir        : " . $data['user_name'] . "\n");
  $printer->text("Waktu        : " . Date('d/m/Y', strtotime($data['date'])) . " " . Date('H:i', strtotime($data['sale_created'])) . "\n");


  // Membuat tabel
  $printer->initialize(); // Reset bentuk/jenis teks
  $query1 = "SELECT * FROM t_sale_detail
            INNER JOIN p_item
            ON t_sale_detail.item_id=p_item.item_id
            WHERE t_sale_detail.sale_id = '$sale_id'";
  $result1 = mysqli_query($koneksi, $query1);
  // $printer->text("-----------------------------------\n");
  // $printer->text(buatBaris5Kolom("Barang", "qty", "Harga", "Disc.", "Subtotal"));
  $printer->text("-----------------------------------------\n");
  while ($data1 = mysqli_fetch_assoc($result1)) {
    $printer->text($data1['name'] . "\n");
    $printer->text(buatBaris4Kolom($data1['qty'] . " X", $data1['price'] . " -", $data1['discount_item'] . " =", ($data1['qty'] * $data1['price'] - $data1['discount_item'])));
  }
  $printer->text("-----------------------------------------\n");
  $printer->text(buatBaris4Kolom('', '', "Total", $data['total_price']));
  $printer->text(buatBaris4Kolom('', '', "Disc.", $data['discount']));
  $printer->text(buatBaris4Kolom('', '', "G. Total", $data['final_price']));
  $printer->text(buatBaris4Kolom('', '', "Cash", $data['cash']));
  $printer->text(buatBaris4Kolom('', '', "Change", $data['remaining']));
  $printer->text("\n");

  // Pesan penutup
  $printer->initialize();
  $printer->setJustification(Mike42\Escpos\Printer::JUSTIFY_CENTER);
  $printer->text("Terima kasih telah berbelanja\n");

  $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
  $printer->close();
  echo "<script>window.close();</script>";
} catch (Exception $e) {
  echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
  echo "Koneksi Tidak di Temukan \n";
  echo "<script>window.close();</script>";
}
