
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $dbname = "db_mahasiswa";

    $koneksi = mysqli_connect($host, $user, $pass, $dbname);

    if(!$koneksi){
        die("Koneksi gagal : ".mysqli_connect_error());
    }
    ?>

</body>
</html>