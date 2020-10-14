<?php
include '../koneksi.php';
?>
<div class="form-group">
    <label for="kategori">Satuan Barang</label>
    <div class="row">
        <div class="col-md-11">
            <select name="satuanbarang" class="form-control" style="width: 100%;" required>
                <option disabled selected="selected">- Pilih -</option>
                <?php
                $query = "SELECT * FROM p_satuanbarang";
                $result = mysqli_query($koneksi, $query);
                while ($kategori = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo "$kategori[unit_id]"; ?>"><?php echo "$kategori[name]"; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-1" style="padding-left:1px">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-satuanbarang">+</button>
        </div>
    </div>
</div>