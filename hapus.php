<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "koneksi.php";

    $id = $_GET['id'];
    mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE id='$id'");
    header("Location: list.php");
    ?>

</body>
</html>