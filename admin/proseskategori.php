<?php
    include '../koneksi.php';
    if(isset($_POST['simpankategori']))
    {
        $namakategori   = $_POST['namakategori'];

        $query  = "INSERT INTO tb_kategori VALUES('','$namakategori')";

        if(empty($namakategori))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatkategoribaru.php';</script>
            ";
        }
        elseif(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'kategori.php';</script>
            ";
        }
    }
    elseif(isset($_POST['ubahkategori']))
    {
        $id = $_POST['id'];
        $namakategori = $_POST['namakategori'];

        $query = "UPDATE tb_kategori SET 
        kategori = '$namakategori'
        WHERE id = '$id'
        ";

        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Diubah');
            window.location = 'kategori.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahkategori.php';</script>
            ";
        }
    }
    elseif(isset(($_POST['hapuskategori'])))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM tb_kategori WHERE id = '$id'";
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Dihapus');
            window.location = 'kategori.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Dihapus');
            window.location = 'ubahkategori.php';</script>
            ";
        }
    }
    else
    {
        header('location: kategori.php');
    }
?>