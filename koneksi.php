<?php
    $servername = "localhost";
    $username   = "id14738878_tokohidayatnative";
    $password   = "Fajar23dilon.";
    $database   = "id14738878_db_tokoretail";

    $koneksi    = mysqli_connect($servername, $username, $password, $database);

    if(!$koneksi)
    {
        die("Connection Failed : " . mysqli_connect_error());
    }
?>