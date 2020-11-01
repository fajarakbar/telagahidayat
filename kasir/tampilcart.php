<?php
include '../koneksi.php';
session_start();
$userid    = $_SESSION['userid'];
$no = 1;
$query = "SELECT *, p_item.name AS item_name, t_cart.price AS cart_price
        FROM t_cart
        JOIN p_item
        ON t_cart.item_id = p_item.item_id
        WHERE t_cart.user_id = '$userid'";
$result = mysqli_query($koneksi, $query);
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td class="barcode"><?php echo $data['barcode']; ?></td>
            <td><?php echo $data['item_name']; ?></td>
            <td class="text-right"><?php echo $data['cart_price']; ?></td>
            <td class="text-center"><?php echo $data['qty']; ?></td>
            <td class="text-right"><?php echo $data['discount_item_rp']; ?></td>
            <td class="text-right"><?php echo $data['discount_item_persen']; ?></td>
            <td class="text-right"><?php echo $data['item_diskon']; ?></td>
            <td class="text-right" id="total"><?php echo $data['total']; ?></td>
            <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
                    data-cartid="<?= $data['cart_id']; ?>" 
                    data-barcode="<?= $data['barcode']; ?>"
                    data-product="<?= $data['item_name']; ?>" 
                    data-stock="<?= $data['stock']; ?>" 
                    data-price="<?= $data['cart_price']; ?>"
                    data-qty="<?= $data['qty']; ?>" 
                    data-discount_item_rp="<?= $data['discount_item_rp']; ?>"
                    data-discount_item_persen="<?= $data['discount_item_persen']; ?>"
                    data-item_diskon="<?= $data['item_diskon']; ?>"
                    data-total="<?= $data['total']; ?>" 
                    class="btn btn-xs btn-primary">
                    <i class="fa fa-pencil"></i> Update
                </button>
                <button id="del_cart" data-cartid="<?php echo $data['cart_id']; ?>" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </td>
        </tr>
    <?php } ?>

<?php } else {
    echo '<tr>
        <td colspan="10" class="text-center">Tidak ada item</td>
    </tr>';
} ?>