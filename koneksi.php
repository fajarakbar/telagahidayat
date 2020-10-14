<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "db_pos";

$koneksi    = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Connection Failed : " . mysqli_connect_error());
}
