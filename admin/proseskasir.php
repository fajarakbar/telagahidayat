<?php
if(isset($_POST['add_cart'])) {
    $item_id = $_POST['item_id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    var_dump($item_id,$price,$qty);
}


?>