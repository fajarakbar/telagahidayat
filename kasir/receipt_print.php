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
?>

<html moznomarginboxes mozdisallowselectionprint>

<head>
  <title>TelagaPOS - Print Nota</title>
  <style type="text/css">
    html {
      font-family: "Verdana, Arial";
    }

    .content {
      width: 80mm;
      font-size: 12px;
      padding: 5 px;
    }

    .title {
      text-align: center;
      font-size: 13px;
      padding-bottom: 5px;
      border-bottom: 1px dashed;
    }

    .head {
      margin-top: 5px;
      margin-bottom: 10px;
      padding-bottom: 10px;
      border-bottom: 1px solid;
    }

    table {
      width: 100%;
      font-size: 12px;
    }

    .thanks {
      margin-top: 10px;
      padding-top: 10px;
      text-align: center;
      border-top: 1px dashed;
    }

    @media print {
      @page {
        width: 80mm;
        margin: 0mm;
      }
    }
  </style>
</head>

<body onload="window.print()">
  <div class="content">
    <div class="title">
      <?php $toko = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM outlet WHERE outlet_id='$outlet_id'")); ?>
      <b>Toko <?= $toko['name'];?></b>
      <br>
      <?=$toko['address'];?>
    </div>
    <?php
    $sale_id = $_GET['sale_id'];
    $query = "SELECT t_sale.invoice, t_sale.customer_id, t_sale.total_price, t_sale.discount, t_sale.final_price,
                    t_sale.cash, t_sale.remaining, t_sale.note, t_sale.date, t_sale.user_id, t_sale.created AS sale_created, user.username AS user_name  
                    FROM t_sale 
                    INNER JOIN user
                    ON t_sale.user_id=user.user_id
                    WHERE t_sale.sale_id = '$sale_id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    $query1 = "SELECT * FROM t_sale_detail
                    INNER JOIN p_item
                    ON t_sale_detail.item_id=p_item.item_id
                    WHERE t_sale_detail.sale_id = '$sale_id'";
    $result1 = mysqli_query($koneksi, $query1);
    // $data1 = mysqli_fetch_assoc($result1);
    ?>
    <div class="head">
      <table cellspacing="0" cellpadding="0">
        <tr>
          <td style="width:200px">
            <?php echo Date("d/m/Y", strtotime($data['date'])) . " " . Date("H:i", strtotime($data['sale_created'])); ?>
          </td>
          <td>Cashier</td>
          <td style="text-align:center; width: 10px">:</td>
          <td style="text-align:right"><?= ucfirst($data['user_name']) ?></td>
        </tr>
        <tr>
          <td><?= $data['invoice'] ?></td>
          <td>Customer</td>
          <td style="text-align:center">:</td>
          <td style="text-align:right">
            <?= $data['customer_id'] == null ? "Umum" : "Umum" ?>
          </td>
        </tr>
      </table>
    </div>
    <div class="transaction">
      <table class="transaction-table" cellspacing="0" cellpadding="0">
        <?php
        $arr_discount = array();
        while ($data1 = mysqli_fetch_assoc($result1)) { ?>
          <tr>
            <td style="width: 165px"><?= $data1['name'] ?></td>
            <td><?= $data1['qty'] ?></td>
            <td style="text-align:right; width:60px"><?= $data1['price'] ?></td>
            <td style="text-align:right; width:60px">
              <?= ($data1['price'] * $data1['qty']) ?>
            </td>
          </tr>
          <?php if ($data1['discount_item'] > 0) {
            $no = 0; ?>
            <tr>
              <td></td>
              <td colspan="2" style="text-align:right">Disc. <?= ($no + 1) ?></td>
              <td style="text-align:right"><?= $data1['discount_item'] ?></td>
            </tr>
        <?php
          }
        } ?>



        <?php foreach ($arr_discount as $key => $value) { ?>
          <tr>
            <td></td>
            <td colspan="2" style="text-align:right">Disc. <?= ($key + 1) ?></td>
            <td style="text-align:right"><?= $value ?></td>
          </tr>
        <?php } ?>


        <tr>
          <td colspan="4" style="border-bottom:1px dashed; padding-top:5px"></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td style="text-align:right; padding-top:5px">Sub Total</td>
          <td style="text-align:right; padding-top:5px">
            <?= $data['total_price'] ?>
          </td>
        </tr>
        <?php if ($data['discount'] > 0) { ?>
          <tr>
            <td colspan="2"></td>
            <td style="text-align:right; padding-bottom:5px">Disc.Sale</td>
            <td style="text-align:right; padding-bottom:5px"><?= $data['discount'] ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td colspan="2"></td>
          <td style="border-top:1px dashed; text-align:right; padding-bottom:5px 0">Grand Total</td>
          <td style="border-top:1px dashed; text-align:right; padding-bottom:5px 0"><?= $data['final_price'] ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td style="border-top:1px dashed; text-align:right; padding-bottom:5px">Cash</td>
          <td style="border-top:1px dashed; text-align:right; padding-bottom:5px"><?= $data['cash'] ?></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td style="text-align:right">Change</td>
          <td style="text-align:right"><?= $data['remaining'] ?></td>
        </tr>
      </table>
    </div>
    <div class="thanks">
      ~~~ Terima Kasih ~~~
    </div>
  </div>
</body>

</html>