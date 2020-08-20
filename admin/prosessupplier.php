<?php
    include '../koneksi.php';
    if(isset($_POST['simpanproduk']))
    {
        $namaproduk = $_POST['namaproduk'];
        $kategori   = $_POST['kategori'];
        $hargajual  = $_POST['hargajual'];
        $sku        = $_POST['sku'];
        $barcode    = $_POST['barcode'];
        $fotoproduk = $_POST['fotoproduk'];

        $query  = "INSERT INTO tb_produk VALUES(
            '',
            '$namaproduk',
            '$kategori',
            '$hargajual',
            '$sku',
            '$barcode',
            '$fotoproduk'
            )";
        // var_dump ($namaproduk,$kategori,$hargajual,$sku,$barcode,$fotoproduk);
        if(empty($namaproduk) || empty($kategori) || empty($hargajual) || empty($barcode))
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
    elseif(isset(($_POST['hapussupplier'])))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM supplier WHERE supplier_id = '$id'";
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Dihapus');
            window.location = 'suppliers.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Dihapus');
            window.location = 'suppliers.php';</script>
            ";
        }
    }
    else
    {
        header('location: suppliers.php');
    }
?>
