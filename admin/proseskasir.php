<?php
include '../koneksi.php';
session_start();
if(isset($_POST['add_cart'])) {
    $item_id    = $_POST['item_id'];
    $price      = $_POST['price'];
    $qty        = $_POST['qty'];
    
    // membuat nomor urut cart
    $query = "SELECT MAX(cart_id) AS cart_no FROM t_cart";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $car_no = ((int)$row['cart_no']) + 1;
    
    $iditem = mysqli_query($koneksi,"SELECT * FROM t_cart");
    $dat = mysqli_fetch_assoc($iditem);
    $id = $dat['item_id'];
    if ($id == $item_id) {
        //update qty dan total
        $updateqty = "UPDATE t_cart SET price = '$price', qty = qty + '$qty', total = '$price' * qty WHERE item_id = '$item_id'";
        $update = mysqli_query($koneksi,$updateqty);
        $data = mysqli_affected_rows($koneksi);
        if($data > 0) {
            // echo("dari update");
            $params = array("success" => true);
            
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);  
    } else {
        //untuk menambahkan ke database t_cart
        $user_id    = $_SESSION['userid'];
        $total      = $price * $qty;
        $result1 = mysqli_query($koneksi,("INSERT INTO t_cart VALUES('$car_no','$item_id','$price','$qty','','$total','$user_id')"));
        $data = mysqli_affected_rows($koneksi);
        if($data > 0) {
            // echo("dari simpan awal");
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);  
    }
    

    
}
?>
