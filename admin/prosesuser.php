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
        $outlet         = $outlet = $_POST['outlet'] == "1" ? NULL : $_POST['outlet'];
        $query = "INSERT INTO user(name,telp,address,username,password,level,outlet_id) VALUES ('$namalengkap','$telp','$alamat','$username','$pass','$level','$outlet')";
        // $query  = "INSERT INTO user (name,telp,address,username,password,level,outlet_id) VALUES ('$namalengkap','$telp','$alamat','$username','$pass','$level','$outlet)";
        $cek_username = mysqli_num_rows(mysqli_query($koneksi,"SELECT username FROM user WHERE username='$username'"));
        if(empty($namalengkap) || empty($outlet) || empty($username) || empty($pass) || empty($level))
        {
            echo"
            <script>alert('Data Gagal Ditambahkan');
            window.location = 'buatuserbaru.php';</script>
            ";
        }
        elseif($cek_username > 0)
        {
            echo"
            <script>alert('Username sudah ada yang pakai. Ulangi lagi');
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
        else
        {
            echo"error";
        }
    }
    elseif(isset($_POST['ubahuser']))
    {
        $id             = $_POST['user_id'];
        $namalengkap    = $_POST['namalengkap'];
        $telp           = $_POST['telp'];
        $alamat         = $_POST['alamat'];
        $pass           = sha1($_POST['pass']);
        $level          = $_POST['level'];
        $updated        = date('Y-m-d H:i:s');
        $outlet         = $_POST['outlet'];
        // var_dump($id,$namalengkap,$telp,$alamat,$pass,$level,$updated,$outlet);
        $query = "UPDATE user SET name = '$namalengkap', telp = '$telp', address = '$alamat', password = '$pass', level = $level, updated = '$updated', outlet_id = $outlet WHERE user_id = $id";
        $succes = mysqli_query($koneksi,$query);
        // var_dump($query);
        if($succes == TRUE)
        {
            echo"
            <script>alert('Data Berhasil Diubah');
            window.location = 'daftaruser.php';</script>
            ";
        }
        else
        {
            die('Query Error : '.mysqli_error($query));
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
