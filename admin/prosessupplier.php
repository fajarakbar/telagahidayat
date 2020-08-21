<?php
    include '../koneksi.php';
    if(isset($_POST['simpansupplier']))
    {
        $namasupplier   = $_POST['namasupplier'];
        $notelepon      = $_POST['notelepon'];
        $alamat         = $_POST['alamat'];
        $catatan        = empty($_POST['catatan']) ? NULL : $_POST['catatan'];

        $query  = "INSERT INTO supplier(name,phone,address,description) VALUES(
            '$namasupplier',
            '$notelepon',
            '$alamat',
            '$catatan'
            )";
            
        if(empty($namasupplier) || empty($notelepon) || empty($alamat))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatsupplierbaru.php';</script>
            ";
        }
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'suppliers.php';</script>
            ";
        }
    }

    elseif(isset($_POST['ubahsupplier']))
    {
        $id             = $_POST['id'];
        $namasupplier   = $_POST['namasupplier'];
        $notelepon      = $_POST['notelepon'];
        $alamat         = $_POST['alamat'];
        $catatan        = empty($_POST['catatan']) ? NULL : $_POST['catatan'];
        $updated        = date('Y-m-d H:i:s');

        // var_dump($id,$namasupplier,$notelepon,$alamat,$catatan,$updated);
        $query = "UPDATE supplier SET
        name        = '$namasupplier',
        phone       = '$notelepon',
        address     = '$alamat',
        description = '$catatan',
        updated     = '$updated'
        WHERE supplier_id    = '$id'
        ";
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Diubah');
            window.location = 'suppliers.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahsupplier.php';</script>
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
