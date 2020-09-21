<?php
include '../koneksi.php';
session_start();
$outlet = $_POST['outlet'];
// $outlet = 2;
$query = "SELECT outlet.name AS outlet_name, p_item.item_id, p_item.barcode, p_item.name, p_kategori.name AS category_name, p_satuanbarang.name AS unit_name, p_item.price, p_item.stock 
            FROM p_item 
            INNER JOIN p_kategori
            ON p_kategori.category_id=p_item.category_id
            INNER JOIN p_satuanbarang
            ON p_satuanbarang.unit_id=p_item.unit_id
            INNER JOIN outlet
            ON outlet.outlet_id=p_item.outlet_id
            WHERE p_item.outlet_id='$outlet'";
$result = mysqli_query($koneksi, $query);
function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

while ($produk = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo "$produk[outlet_name]"; ?></td>
        <td><?php echo "$produk[barcode]"; ?></td>
        <td><?php echo "$produk[name]"; ?></td>
        <td><?php echo "$produk[unit_name]"; ?></td>
        <td><?php echo rupiah("$produk[price]"); ?></td>
        <td><?php echo "$produk[stock]"; ?></td>
        <td>
            <button class="btn btn-info btn-sm" id="select" data-id="<?= "$produk[item_id]"; ?>" data-barcode="<?= "$produk[barcode]"; ?>" data-name="<?= "$produk[name]"; ?>" data-unit="<?= "$produk[unit_name]"; ?>" data-stock="<?= "$produk[stock]"; ?>">
                <i type="button" class="fa fa-check"></i> Select
            </button>
        </td>
    </tr>
<?php } ?>