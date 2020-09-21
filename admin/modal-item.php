<?php
$query = "SELECT p_item.item_id, p_item.barcode, p_item.name, p_kategori.name AS category_name, p_satuanbarang.name AS unit_name, p_item.price, p_item.stock 
          FROM p_item 
          INNER JOIN p_kategori
          ON p_kategori.category_id=p_item.category_id
          INNER JOIN p_satuanbarang
          ON p_satuanbarang.unit_id=p_item.unit_id";

$result = mysqli_query($koneksi, $query);
while ($produk = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?php echo "$produk[barcode]"; ?></td>
    <td><?php echo "$produk[name]"; ?></td>
    <td><?php echo "$produk[unit_name]"; ?></td>
    <td><?php echo "$produk[price]"; ?></td>
    <td><?php echo "$produk[stock]"; ?></td>
    <td>
      <button class="btn btn-info btn-sm" id="select" data-id="<?= "$produk[item_id]"; ?>" data-barcode="<?= "$produk[barcode]"; ?>" data-price="<?= "$produk[price]"; ?>" data-stock="<?= "$produk[stock]"; ?>">
        <i type="button" class="fa fa-check"></i> Select
      </button>
    </td>
  </tr>
<?php } ?>