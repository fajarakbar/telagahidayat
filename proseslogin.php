<?php
    include 'koneksi.php';
    if(isset($_POST['login']))
    {
        $username   = $_POST['username'];
        $password   = sha1($_POST['password']);

        $query  = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                session_start();
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['nama'] = $row['name'];
                $_SESSION['level'] = $row['level'];
            }
            echo "
            <script>
            alert('Selamat, login berhasil');
            window.location = 'admin/index.php';
            </script>
            
            ";
        }
        else
        {
            echo "
            <script>
            alert('Username atau Password anda salah, Coba Lagi');
            window.location = 'index.php';
            </script>
            
            ";
        }
    }
?>
