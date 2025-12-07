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

$nim    = $_POST['nim'];
$nama   = $_POST['nama'];
$prodi  = $_POST['prodi'];
$jk     = $_POST['jk'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi,"UPDATE mahasiswa SET 
    nim='$nim',
    nama='$nama',
    prodi='$prodi',
    jk='$jk',
    alamat='$alamat'
    WHERE id='$id'");

header("Location: list.php");
?>
</body>
</html>