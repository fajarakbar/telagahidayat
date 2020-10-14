<?php
include '../koneksi.php';
if (isset($_POST['simpanuser'])) {
    $namalengkap    = $_POST['namalengkap'];
    $telp           = $_POST['telp'];
    $alamat         = $_POST['alamat'];
    $username       = $_POST['username'];
    $pass           = sha1($_POST['pass']);
    $level          = $_POST['level'];
    $outlet         = $_POST['outlet'];
    $user_id        = 10 . str_shuffle(date('dmyhis'));
    $query = "INSERT INTO user(user_id,name,telp,address,username,password,level,outlet_id) VALUES ('$user_id','$namalengkap','$telp','$alamat','$username','$pass','$level','$outlet')";
    $cek_user_id = mysqli_num_rows(mysqli_query($koneksi, "SELECT user_id FROM user WHERE user_id='$user_id'"));
    $cek_username = mysqli_num_rows(mysqli_query($koneksi, "SELECT username FROM user WHERE username='$username'"));
    if ($cek_user_id > 0) {
        $user_id_baru  = 10 . str_shuffle(date('dmyhis'));
        if (empty($namalengkap) || empty($outlet) || empty($username) || empty($pass) || empty($level || empty($$outlet))) {
            echo "
                <script>alert('Form Wajib di Isi');
                window.location = 'buatuserbaru.php';</script>
                ";
        } elseif ($cek_username > 0) {
            echo "
                <script>alert('Username sudah ada yang pakai. Ulangi lagi');
                window.location = 'buatuserbaru.php';</script>
                ";
        } else {
            $query1 = "INSERT INTO user(user_id,name,telp,address,username,password,level,outlet_id) VALUES ('$user_id','$namalengkap','$telp','$alamat','$username','$pass','$level','$outlet')";
            $result1 = mysqli_query($koneksi, $query1);
            echo "
                <script>alert('Data Berhasil Ditambahkan');
                window.location = 'daftaruser.php';</script>
                ";
        }
    } elseif (empty($namalengkap) || empty($outlet) || empty($username) || empty($pass) || empty($level || empty($$outlet))) {
        echo "
            <script>alert('Form Wajib di Isi');
            window.location = 'buatuserbaru.php';</script>
            ";
    } elseif ($cek_username > 0) {
        echo "
            <script>alert('Username sudah ada yang pakai. Ulangi lagi');
            window.location = 'buatuserbaru.php';</script>
            ";
    } elseif (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Ditambahkan');
            window.location = 'daftaruser.php';</script>
            ";
    } else {
        mysqli_error($query);
        echo "
        <script>alert('Kondisi error');
        window.location = 'daftaruser.php';
        </script>
        ";
    }
} elseif (isset($_POST['ubahuser'])) {
    $id             = $_POST['user_id'];
    $namalengkap    = $_POST['namalengkap'];
    $telp           = $_POST['telp'];
    $alamat         = $_POST['alamat'];
    $pass           = sha1($_POST['pass']);
    $level          = $_POST['level'];
    $updated        = date('Y-m-d H:i:s');
    $outlet         = $_POST['outlet'];
    $query = "UPDATE user SET name = '$namalengkap', telp = '$telp', address = '$alamat', password = '$pass', level = $level, updated = '$updated', outlet_id = $outlet WHERE user_id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Diubah');
            window.location = 'daftaruser.php';</script>
            ";
    } else {
        die('Query Error : ' . mysqli_error($query));
        echo "
            <script>alert('Data Gagal Diubah');
            window.location = 'ubahuser.php';</script>
            ";
    }
} elseif (isset(($_POST['hapususer']))) {
    $id = $_POST['id'];
    $query = "DELETE FROM user WHERE user_id = '$id'";
    // var_dump($query);
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>alert('Data Berhasil Dihapus');
            window.location = 'daftaruser.php';</script>
            ";
    } else {
        echo "
            <script>alert('Data gagal dihapus');
            window.location = 'daftaruser.php';</script>
            ";
    }
} else {
    header('location: daftaruser.php');
}
