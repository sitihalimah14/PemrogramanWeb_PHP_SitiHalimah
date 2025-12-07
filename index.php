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
<title>Input Data Mahasiswa</title>

<style>

body{
    font-family: Poppins, sans-serif;
    background: #2C1E13;
    margin:0;
    padding:0;
}

h2{
    text-align:center;
    color:#EED9C4;
    margin-top:30px;
}

form{
    width:90%;
    max-width:450px;
    background:#3B281B;
    padding:25px;
    border-radius:10px;
    margin:40px auto;
    box-shadow: 0 0 15px rgba(0,0,0,0.5);
    color:white;
}

label{
    font-weight:600;
    color:#F5E6D3;
}

input, select, textarea{
    width:100%;
    padding:10px;
    border:none;
    border-radius:5px;
    margin-top:6px;
    background:#EADBC8;
    font-size:15px;
    font-family:Poppins;
    outline:none;
    margin-bottom:14px;
}

textarea{
    height:80px;
}

button{
    background:#6E4B3A;
    padding:10px 18px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    color:#fff;
    font-weight:600;
    transition:0.3s;
}

button:hover{
    background:#8b604b;
}

.btn-row{
    display:flex;
    gap:10px;
    justify-content:center;
    margin-top:10px;
}

.btn-back{
    background:#A67B5B;
    padding:10px 18px;
    border-radius:5px;
    color:white;
    text-decoration:none;
    font-weight:600;
    display:inline-block;
}

.btn-back:hover{
    background:#C18D67;
}

</style>

</head>

<body>

<h2>Form Input Data Mahasiswa</h2>

<form action="proses_koneksi.php" method="POST">

    <label>NIM</label>
    <input type="text" name="nim" required>

    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Program Studi</label>
    <input type="text" name="prodi" required>

    <label>Jenis Kelamin</label>
    <select name="jk" required>
        <option value="" selected disabled>-- pilih jenis kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <label>Alamat</label>
    <textarea name="alamat" required></textarea>

    <div class="btn-row">
        <button type="submit">Simpan</button>
        <a href="list.php" class="btn-back">Kembali</a>
    </div>

</form>

</body>
</html>
