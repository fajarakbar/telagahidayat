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
$result = mysqli_query($koneksi,$query);
if (mysqli_num_rows($result) > 0) {
while ($data = mysqli_fetch_assoc($result)) {?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['barcode']; ?></td>
    <td><?php echo $data['item_name']; ?></td>
    <td class="text-right"><?php echo $data['cart_price']; ?></td>
    <td class="text-center"><?php echo $data['qty']; ?></td>
    <td class="text-right"><?php echo $data['discount_item']; ?></td>
    <td class="text-right"><?php echo $data['total']; ?></td>
    <td class="text-center" width="160px">
    <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
        data-cartid="<?= $data['cart_id']; ?>" data-barcode="<?= $data['barcode']; ?>"
        data-product="<?= $data['item_name']; ?>" data-price="<?= $data['cart_price']; ?>"
        data-qty="<?= $data['qty']; ?>" data-discount="<?= $data['discount_item']; ?>"
        data-total="<?= $data['total']; ?>" class="btn btn-xs btn-primary"><i
        class="fa fa-pencil"></i> Update
    </button>
    <button id="del_cart" data-cartid="<?=$data['cart_id'];?>" class="btn btn-xs btn-danger">
        <i class="fa fa-trash"></i> Delete
    </button>
    </td>
</tr>
<?php }?>

<?php } else{
    echo'<tr>
        <td colspan="8" class="text-center">Tidak ada item</td>
    </tr>';
}?>