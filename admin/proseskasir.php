<?php
include '../koneksi.php';
session_start();
if(isset($_POST['add_cart'])) {
    $item_id    = $_POST['item_id'];
    $price      = $_POST['price'];
    $qty        = $_POST['qty'];
    
    //membuat nomor urut cart
    $query = "SELECT MAX(cart_id) AS cart_no FROM t_cart";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $car_no = ((int)$row['cart_no']) + 1;

    $user_id    = $_SESSION['userid'];
    $total      = $price * $qty;
    $result1 = mysqli_query($koneksi,("INSERT INTO t_cart VALUES('$car_no','$item_id','$price','$qty','','$total','$user_id')"));
    $data = mysqli_affected_rows($koneksi);
    if($data > 0) {
        $params = array("success" => true);
    } else {
        $params = array("success" => false);
    }
    echo json_encode($params);  
}
?>
