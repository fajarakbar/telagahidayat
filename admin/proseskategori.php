<?php
    include '../koneksi.php';
    if(isset($_POST['simpankategori']))
    {
        $namakategori   = $_POST['namakategori'];

        $query  = "INSERT INTO p_kategori(name) VALUES('$namakategori')";
        $result = mysqli_query($koneksi,$query);
        $data = mysqli_affected_rows($koneksi);
        if($data > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);  
        // if(empty($namakategori))
        // {
        //     echo"
        //     <script>alert('Data Gagal Ditambahkan');
        //     window.location = 'buatkategoribaru.php';</script>
        //     ";
        // }
        // elseif(mysqli_query($koneksi, $query))
        // {
        //     echo"
        //     <script>alert('Data Berhasil Ditambahkan');
        //     window.location = 'kategori.php';</script>
        //     ";
        // }
    }
    elseif(isset($_POST['ubahkategori']))
    {
        $id             = $_POST['id'];
        $namakategori   = $_POST['namakategori'];
        $updated        = date('Y-m-d H:i:s');

        $query = "UPDATE p_kategori SET 
        name    = '$namakategori',
        updated = '$updated'
        WHERE category_id = '$id'
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
        $query = "DELETE FROM p_kategori WHERE category_id = '$id'";
        // var_dump($query);
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
            <script>alert('Data Sedang digunakan di Produk  ');
            window.location = 'kategori.php';</script>
            ";
        }
    }
    else
    {
        header('location: kategori.php');
    }
?>