<?php
include '../koneksi.php';
session_start();
if (isset($_POST['add_cart'])) {
    $item_id    = $_POST['item_id'];
    $price      = $_POST['price'];
    $qty        = $_POST['qty'];
    $user_id    = $_SESSION['userid'];
    $outlet_id  = $_SESSION['outlet_id'];
    $cart_id    = 6 . str_shuffle(date('dmyhis'));
    // var_dump($item_id,$price);
    $iditem = mysqli_query($koneksi, "SELECT * FROM t_cart WHERE item_id = '$item_id' AND user_id = '$user_id'");
    $id = mysqli_fetch_assoc($iditem);
    $itemid = $id['item_id'];
    $userid = $id['user_id'];
    if (($item_id == $itemid) & ($user_id == $userid)) {
        //update qty dan total
        $query1 = "UPDATE t_cart SET price = '$price', qty = qty + '$qty', total = ('$price' * qty-(discount_item * qty)) WHERE item_id = '$item_id' AND user_id = '$user_id'AND outlet_id = '$outlet_id'";
    } else {
        //untuk menambahkan ke database t_cart
        $total = $price * $qty;
        $query1 = ("INSERT INTO t_cart VALUES('$cart_id','$item_id','$price','$qty','','$total','$user_id','$outlet_id')");
    }
    $result = mysqli_query($koneksi, $query1);
    $data = mysqli_affected_rows($koneksi);
    if ($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);
} elseif (isset($_POST['del_cart'])) {
    $cart_id = $_POST['cart_id'];
    $query2 = "DELETE FROM t_cart WHERE cart_id = '$cart_id'";
    $result = mysqli_query($koneksi, $query2);
    $data = mysqli_affected_rows($koneksi);
    if ($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);
} elseif (isset($_POST['cancel_payment'])) {
    $user_id = $_SESSION['userid'];
    $query2 = "DELETE FROM t_cart WHERE user_id = '$user_id'";
    $result = mysqli_query($koneksi, $query2);
    $data = mysqli_affected_rows($koneksi);
    if ($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);
} elseif (isset($_POST['edit_cart'])) {
    $cart_id = $_POST['cart_id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $discount_item = $_POST['discount_rp'] == '' ? $_POST['discount_persen'] : $_POST['discount_rp'];
    $total = $_POST['total'];

    $query = "UPDATE t_cart SET price = '$price', qty = '$qty', discount_item = '$discount_item', total = '$total' WHERE cart_id = '$cart_id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_affected_rows($koneksi);
    if ($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);
} elseif (isset($_POST['process_payment'])) {
    $invoice = $_POST['invoice'];
    $customer_id = $_POST['customer_id'] == "" ? NULL : NULL;
    $total_price = $_POST['subtotal'];
    $discount = $_POST['discount'];
    $final_price = $_POST['grandtotal'];
    $cash = $_POST['cash'];
    $remaining = $_POST['change'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $outlet_id = $_SESSION['outlet_id'];
    $user_id = $_SESSION['userid'];
    $sale_id    = 7 . str_shuffle(date('dmyhis'));
    $query = "INSERT INTO t_sale (sale_id, invoice, customer_id, total_price, discount, final_price, cash, remaining, note, date, outlet_id, user_id) VALUES (
        '$sale_id',
        '$invoice', 
        '$customer_id', 
        '$total_price', 
        '$discount', 
        '$final_price',
        '$cash', 
        '$remaining', 
        '$note', 
        '$date',
        '$outlet_id',
        '$user_id')";
    $cek_sale_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT sale_id FROM t_sale WHERE sale_id='$sale_id'"));
    if ($cek_sale_id > 0) {
        $sale_id_baru    = 7 . str_shuffle(date('dmyhis'));
        $query1 = "INSERT INTO t_sale (sale_id, invoice, customer_id, total_price, discount, final_price, cash, remaining, note, date, outlet_id, user_id) VALUES (
            '$sale_id_baru',
            '$invoice', 
            '$customer_id', 
            '$total_price', 
            '$discount', 
            '$final_price',
            '$cash', 
            '$remaining', 
            '$note', 
            '$date',
            '$outlet_id',
            '$user_id')";
        $result1 = mysqli_query($koneksi, $query1);
        $result2 = mysqli_query($koneksi, "SELECT * FROM t_cart WHERE user_id = '$user_id'");
        $detail_id = 8 . str_shuffle(date('dmyhis'));
        $sql = "INSERT INTO t_sale_detail (detail_id,sale_id,item_id,price,qty,discount_item,total,date,user_id,outlet_id) VALUES ";
        while ($data1 = mysqli_fetch_assoc($result2)) {
            $detail_id = 8 . str_shuffle(date('dmyhis'));
            $sql .= "('" . $detail_id . "','" . $sale_id_baru . "','" . $data1['item_id'] . "','" . $data1['price'] . "','" . $data1['qty'] . "','" . $data1['discount_item'] . "','" . $data1['total'] . "','" . $date . "','" . $data1['user_id'] . "','" . $data1['outlet_id'] . "'), ";
        }
        $sql = rtrim($sql, ', ');
        mysqli_query($koneksi, $sql);
        $query2 = "DELETE FROM t_cart WHERE user_id = '$user_id'";
        $result3 = mysqli_query($koneksi, $query2);
        $data = mysqli_affected_rows($koneksi);
        if ($data > 0) {
            $params = array("success" => true, "sale_id" => $sale_id_baru);
        } else {
            $params = array("success" => false);
        }
    } else {
        $result4 = mysqli_query($koneksi, $query);
        // $sale_id = mysqli_insert_id($koneksi);

        $result5 = mysqli_query($koneksi, "SELECT * FROM t_cart WHERE user_id = '$user_id'");
        // $jumlah = mysqli_query($koneksi,"UPDATE p_item SET stock = ");

        $sql1 = "INSERT INTO t_sale_detail (detail_id,sale_id,item_id,price,qty,discount_item,total,date,user_id,outlet_id) VALUES ";
        while ($data2 = mysqli_fetch_assoc($result5)) {
            $detail_id = 8 . str_shuffle(date('dmyhis'));
            $sql1 .= "('" . $detail_id . "','" . $sale_id . "','" . $data2['item_id'] . "','" . $data2['price'] . "','" . $data2['qty'] . "','" . $data2['discount_item'] . "','" . $data2['total'] . "','" . $date . "','" . $data2['user_id'] . "','" . $data2['outlet_id'] . "'), ";
        }
        $sql1 = rtrim($sql1, ', ');
        mysqli_query($koneksi, $sql1);
        $query3 = "DELETE FROM t_cart WHERE user_id = '$user_id'";
        $result4 = mysqli_query($koneksi, $query3);
        $data4 = mysqli_affected_rows($koneksi);
        if ($data4 > 0) {
            $params = array("success" => true, "sale_id" => $sale_id);
        } else {
            $params = array("success" => false);
        }
    }
    echo json_encode($params);
} elseif (isset($_POST['barcode'])) {
    $barcode = $_POST['barcode'];
    $outlet_id = $_SESSION['outlet_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM p_item WHERE barcode='$barcode' AND outlet_id='$outlet_id'");
    $data1 = mysqli_fetch_array($query);
    $data = array(
        'item_id' => $data1['item_id'],
        'barcode' => $data1['barcode'],
        'name' => $data1['name'],
        'price' => $data1['price'],
        'satuan' => $data1['unit_id'],
        'stock' => $data1['stock'],
    );
    echo json_encode($data);
} elseif (isset($_POST['simpanprofil'])) {
    $namaoutlet = $_POST['namaoutlet'];
    $idkasir    = $_POST['idkasir'];
    $alamat     = $_POST['alamat'];
    $phone      = $_POST['phone'];
    $cek_idkasir = mysqli_num_rows(mysqli_query($koneksi, "SELECT kasir_id FROM outlet WHERE kasir_id='$idkasir'"));
    $query = "INSERT INTO outlet VALUES
                '',
                '$namaoutlet',
                '$idkasir',
                '$alamat',
                '$phone'";
    if (empty($namaoutlet) || empty($idkasir)) {
        echo "
            <script>alert('Data wajib diisi');
            window.location = 'editprofiloutlet.php';</script>
            ";
    } elseif ($cek_idkasir > 0) {
        echo "
            <script>alert('Id Kasir sudah digunakan');
            window.location = 'editprofiloutlet.php';</script>
            ";
    } elseif (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'setting.php';</script>
            ";
    } else {
        echo "
            <script>alert('Error');
            window.location = 'setting.php';</script>
            ";
    }
}
