<?php
    include '../koneksi.php';
    if(isset($_POST['simpanproduk']))
    {
        $barcode        = $_POST['barcode'];
        $namaproduk     = $_POST['namaproduk'];
        $kategori       = $_POST['kategori'];
        $satuanbarang   = $_POST['satuanbarang'];    
        $harga          = $_POST['harga'];

        // $query = "INSERT INTO p_item (barcode,name,category_id,unit_id,price) VALUES (
        //     '$barcode',
        //     '$namaproduk',
        //     '$kategori',
        //     '$satuanbarang',
        //     '$harga'
        //     )";
        // var_dump ($barcode,$namaproduk,$kategori,$satuanbarang,$harga);
        // mysqli_query($koneksi, $query);
        if(empty($namaproduk) || empty($kategori) || empty($harga) || empty($kategori) || empty($satuanbarang))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatprodukbaru.php';</script>
            ";
        }
        else
        {
            $query = "INSERT INTO p_item (barcode,name,category_id,unit_id,price) VALUES (
                '$barcode',
                '$namaproduk',
                '$kategori',
                '$satuanbarang',
                '$harga'
                )";
            mysqli_query($koneksi, $query);
            echo"
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftarproduk.php';</script>
            ";
        }
    }

    elseif(isset($_POST['ubahproduk']))
    {
        $id             = $_POST['id'];
        $barcode        = $_POST['barcode'];
        $namaproduk     = $_POST['namaproduk'];
        $kategori       = $_POST['kategori'];
        $satuanbarang   = $_POST['satuanbarang'];    
        $harga          = $_POST['harga'];
        $updated        = date('Y-m-d H:i:s');

        $query = "UPDATE p_item SET
        barcode= '$barcode',
        name= '$namaproduk',
        category_id= '$kategori',
        unit_id= '$satuanbarang',
        price= '$harga',
        updated= '$updated'
        WHERE item_id = '$id'
        ";

        // var_dump($id,$barcode,$namaproduk,$kategori,$satuanbarang,$harga,$updated);
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
            window.location = 'ubahproduk.php?id=$id';</script>
            ";
        }
    }
    elseif(isset(($_POST['hapusproduk'])))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM p_item WHERE item_id = '$id'";
        // var_dump($query);
        
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
            window.location = 'daftarproduk.php';</script>
            ";
        }
    }
    else
    {
        header('location: daftarproduk.php');
    }
?>
