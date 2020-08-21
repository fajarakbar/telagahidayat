<?php
    include '../koneksi.php';
    if(isset($_POST['simpanproduk']))
    {
        $barcode        = $_POST['barcode'];
        $namaproduk     = $_POST['namaproduk'];
        $kategori       = $_POST['kategori'];
        $satuanbarang   = $_POST['satuanbarang'];    
        $harga          = $_POST['harga'];

        $query = "INSERT INTO p_item (bacode,name,category_id,unit_id,price) VALUES (
            '$barcode',
            '$namaproduk',
            '$kategori',
            '$satuanbarang',
            '$harga'
            )";
        // var_dump ($barcode,$namaproduk,$kategori,$satuanbarang,$harga);
        // mysqli_query($koneksi, $query);
        if(empty($namaproduk) || empty($harga))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatprodukbaru.php';</script>
            ";
        }
        elseif(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftarproduk.php';</script>
            ";
        }
    }

    elseif(isset($_POST['ubahproduk']))
    {
        $id         = $_POST['id'];
        $namaproduk = $_POST['namaproduk'];
        $kategori   = $_POST['kategori'];
        $hargajual  = $_POST['hargajual'];
        $sku        = $_POST['sku'];
        $barcode    = $_POST['barcode'];
        $fotoproduk = $_POST['fotoproduk'];

        $query = "UPDATE tb_produk SET
        namaproduk  = '$namaproduk',
        kategori    = '$kategori',
        hargajual   = '$hargajual',
        sku         = '$sku',
        barcode     = '$barcode',
        fotoproduk  = '$fotoproduk'
        WHERE id = '$id'
        ";
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Diubah');
            window.location = 'daftarproduk.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahproduk.php';</script>
            ";
        }
    }
    elseif(isset(($_POST['hapusproduk'])))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM tb_produk WHERE id = '$id'";
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Dihapus');
            window.location = 'daftarproduk.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Dihapus');
            window.location = 'ubahproduk.php';</script>
            ";
        }
    }
    else
    {
        header('location: daftarproduk.php');
    }
?>
