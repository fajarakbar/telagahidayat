<?php
include '../koneksi.php';
session_start();
if(isset($_POST['add_cart'])) {
    $item_id    = $_POST['item_id'];
    $price      = $_POST['price'];
    $qty        = $_POST['qty'];
    $user_id    = $_SESSION['userid'];
    
    // membuat nomor urut cart
    $query = "SELECT MAX(cart_id) AS cart_no FROM t_cart";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $car_no = ((int)$row['cart_no']) + 1;
    
    $iditem = mysqli_query($koneksi,"SELECT * FROM t_cart WHERE item_id = '$item_id' AND user_id = '$user_id'");
    $id = mysqli_fetch_assoc($iditem);
    $itemid = $id['item_id'];
    $userid = $id['user_id'];
    // var_dump($userid);
    if (($item_id == $itemid) & ($user_id == $userid)) {
        //update qty dan total
        $query1 = "UPDATE t_cart SET price = '$price', qty = qty + '$qty', total = '$price' * qty WHERE item_id = '$item_id' AND user_id = '$user_id'";
    } else {
        //untuk menambahkan ke database t_cart
        
        $total = $price * $qty;
        $query1 = ("INSERT INTO t_cart VALUES('$car_no','$item_id','$price','$qty','','$total','$user_id')");
    }
    $result = mysqli_query($koneksi,$query1);
    $data = mysqli_affected_rows($koneksi);
    if($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);  
} 

elseif (isset($_POST['del_cart'])) {
    $cart_id = $_POST['cart_id'];
    $query2 = "DELETE FROM t_cart WHERE cart_id = '$cart_id'";
    $result = mysqli_query($koneksi,$query2);
    $data = mysqli_affected_rows($koneksi);
    if($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);  
}

elseif (isset($_POST['edit_cart'])) {
    $cart_id = $_POST['cart_id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $discount_item = $_POST['discount'];
    $total = $_POST['total'];

    $query = "UPDATE t_cart SET price = '$price', qty = '$qty', discount_item = '$discount_item', total = '$total' WHERE cart_id = '$cart_id'";
    $result = mysqli_query($koneksi,$query);
    $data = mysqli_affected_rows($koneksi);
    if($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);  
}

elseif (isset($_POST['process_payment'])) {
    $invoice = $_POST['invoice'];
    $customer_id = $_POST['customer_id'];
    $total_price = $_POST['subtotal'];
    $discount = $_POST['discount'];
    $final_price = $_POST['grandtotal'];
    $cash = $_POST['cash'];
    $remaining = $_POST['change'];
    $note = $_POST['note'];
    $date = $_POST['date'];
    $user_id = $_SESSION['nama'];

    $query = "INSERT INTO t_sale VALUES ('$invoice','$customer_id','$total_price','$discount','$final_price','$cash','$remaining','$note','$date','$user_id')";
    $result = mysqli_query($koneksi,$query);
    $data = mysqli_affected_rows($koneksi);
    if($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);  
}
?>
