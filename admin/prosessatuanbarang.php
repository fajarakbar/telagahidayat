<?php
    include '../koneksi.php';
    if(isset($_POST['simpansatuanbarang']))
    {
        $namasatuanbarang   = $_POST['namasatuanbarang'];

        $query  = "INSERT INTO p_satuanbarang(name) VALUES('$namasatuanbarang')";

        if(empty($namasatuanbarang))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatsatuanbarangbaru.php';</script>
            ";
        }
        elseif(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'satuanbarang.php';</script>
            ";
        }
    }
    elseif(isset($_POST['ubahsatuanbarang']))
    {
        $id                 = $_POST['id'];
        $namasatuanbarang   = $_POST['namasatuanbarang'];
        $updated            = date('Y-m-d H:i:s');

        $query = "UPDATE p_satuanbarang SET 
        name    = '$namasatuanbarang',
        updated = '$updated'
        WHERE unit_id = '$id'
        ";

        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Diubah');
            window.location = 'satuanbarang.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahsastuanbarang.php';</script>
            ";
        }
    }
    elseif(isset(($_POST['hapussatuanbarang'])))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM p_satuanbarang WHERE unit_id = '$id'";
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Dihapus');
            window.location = 'satuanbarang.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Dihapus');
            window.location = 'ubahsatuanbarang.php';</script>
            ";
        }
    }
    else
    {
        header('location: satuanbarang.php');
    }
?>