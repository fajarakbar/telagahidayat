<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = sha1($_POST['password']);

    $query  = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);
    $cek_outlet = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM outlet"));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['nama'] = $row['name'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['outlet_id'] = $row['outlet_id'];
        }
        if ($_SESSION['level'] == '1') {
            if ($cek_outlet == 0) {
                echo "
                    <script>
                    window.location = 'admin/buatoutletbaru.php';
                    </script>                
                    ";
            } else {
                echo "
                    <script>
                    window.location = 'admin/index.php';
                    </script>                
                    ";
            }
        } elseif ($_SESSION['level'] == '2') {
            echo "
                    <script>
                    window.location = 'kasir/index.php';
                    </script>
                    ";
        } else {
            echo "
                <script>
                window.location = 'index.php';
                </script>
                ";
        }
    } else {
        echo "
            <script>
            alert('Username atau Password anda salah, Coba Lagi');
            window.location = 'index.php';
            </script>
            
            ";
    }
}
