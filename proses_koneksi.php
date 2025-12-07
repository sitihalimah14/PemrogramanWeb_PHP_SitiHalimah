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

// ambil data
$nim    = trim($_POST['nim']);
$nama   = trim($_POST['nama']);
$prodi  = trim($_POST['prodi']);
$jk     = trim($_POST['jk']);
$alamat = trim($_POST['alamat']);

// VALIDASI FORM KOSONG
if($nim=="" || $nama=="" || $prodi=="" || $jk=="" || $alamat==""){
    echo "<script>alert('Semua form harus diisi');history.back();</script>";
    exit;
}

// cek NIM sudah ada/belum
$cekNim = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE nim='$nim'");
if(mysqli_num_rows($cekNim) > 0){
    echo "<script>alert('NIM sudah digunakan!');history.back();</script>";
    exit;
}

// simpan ke database
$query = "INSERT INTO mahasiswa (nim,nama,prodi,jk,alamat) 
VALUES ('$nim','$nama','$prodi','$jk','$alamat')";

if(mysqli_query($koneksi, $query)){
    header("Location: list.php");
}else{
    echo "Gagal!";
}
?>

</body>
</html>