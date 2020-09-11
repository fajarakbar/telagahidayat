<?php
    include '../koneksi.php';
    if(isset($_POST['simpanuser']))
    {
        $namalengkap    = $_POST['namalengkap'];
        $telp           = $_POST['telp'];
        $alamat         = $_POST['alamat'];
        $username       = $_POST['username'];
        $pass           = sha1($_POST['pass']);
        $level          = $_POST['level'];
 
        $query  = "INSERT INTO user(name,telp,address,username,password,level) VALUES ('$namalengkap','$telp','$alamat','$username','$pass','$level')";
        if(empty($namalengkap) || empty($telp) || empty($username) || empty($pass) || empty($level))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatuserbaru.php';</script>
            ";
        }
        elseif(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftaruser.php';</script>
            ";
        }
    }
    elseif(isset($_POST['ubahuser']))
    {
        $id             = $_POST['user_id'];
        $namalengkap    = $_POST['namalengkap'];
        $telp           = $_POST['telp'];
        $alamat         = $_POST['alamat'];
        $username       = $_POST['username'];
        $pass           = sha1($_POST['pass']);
        $level          = $_POST['level'];
        $updated        = date('Y-m-d H:i:s');

        $query = "UPDATE user SET 
        name    = '$namalengkap',
        telp    = '$telp',
        address    = '$alamat',
        username    = '$username',
        password    = '$pass',
        level    = '$level',
        updated = '$updated'
        WHERE user_id = '$id'
        ";

        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Diubah');
            window.location = 'daftaruser.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahuser.php';</script>
            ";
        }
    }
    elseif(isset(($_POST['hapususer'])))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM user WHERE user_id = '$id'";
        // var_dump($query);
        if(mysqli_query($koneksi, $query))
        {
            echo"
            <script>alert('Data Berhasil Dihapus');
            window.location = 'daftaruser.php';</script>
            ";
        }
        else
        {
            echo"
            <script>alert('Data gagal dihapus');
            window.location = 'daftaruser.php';</script>
            ";
        }
    }
    else
    {
        header('location: daftaruser.php');
    }
?>