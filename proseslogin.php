<?php
    include 'koneksi.php';
    if(isset($_POST['login']))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];

        $query  = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                session_start();
                $_SESSION['nama'] = $row['nama'];
                header('location:admin/index.php');
            }
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