<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10">
    <title>pembuatan id unik</title>
</head>

<body>
    <h1>
        <?php
        $date = 1 . str_shuffle(date('dmyhis'));
        echo $date;
        ?>
        <br>
        <?php
        echo uniqid();
        ?>
        <br>
        <?php
        echo time();
        ?>
    </h1>
</body>

</html>