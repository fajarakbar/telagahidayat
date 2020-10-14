<?php
include '../koneksi.php';
$query = "SELECT * FROM p_kategori";
$result = mysqli_query($koneksi, $query);
while ($kategori = mysqli_fetch_assoc($result)) { ?>
    <option value="<?php echo "$kategori[category_id]"; ?>"><?php echo "$kategori[name]"; ?>
    </option>
<?php } ?>