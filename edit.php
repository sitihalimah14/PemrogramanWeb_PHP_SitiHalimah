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
    <title>Edit Data Mahasiswa</title>

    <style>
        body{
            font-family:Poppins,sans-serif;
            margin:0;
            padding:0;
            background:#2A1D12;
            color:#FFEEDB;
        }

        h2{
            text-align:center;
            background:#3C2A20;
            margin:0 0 20px 0;
            padding:20px;
            color:#FFE9CF;
            border-bottom:3px solid #281A12;
            font-size:26px;
        }

        form{
            width:90%;
            max-width:550px;
            background:#3C2A20;
            margin:25px auto;
            padding:25px;
            border-radius:12px;
            box-sizing:border-box;
            box-shadow:0 0 10px rgba(0,0,0,.3);
        }

        label{
            font-weight:500;
            margin-bottom:6px;
            display:block;
        }

        input, select, textarea{
            width:100%;
            padding:10px 12px;
            border-radius:6px;
            border:none;
            background:#E8D4C1;
            font-size:15px;
            margin-bottom:18px;
            box-sizing:border-box;
            font-family:Poppins;
        }

        textarea{
            min-height:100px;
        }

        button{
            padding:12px 22px;
            background:#6B4533;
            border:none;
            color:white;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
        }
        button:hover{
            background:#88604A;
        }

        .button-row{
            display:flex;
            gap:10px;
            justify-content:center;
            margin-top:10px;
        }

        .btn-back{
            background:#5B3F31;
            padding:12px 25px;
            border-radius:6px;
            color:white;
            text-decoration:none;
            display:inline-block;
            font-weight:600;
        }

        .btn-back:hover{
            background:#6B4A3C;
        }
    </style>
</head>

<body>

<?php
include "koneksi.php";
$id = $_GET['id'];
$q  = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id='$id'");
$data = mysqli_fetch_assoc($q);
?>

<h2>Edit Data Mahasiswa</h2>

<form action="update.php?id=<?= $id ?>" method="POST">

    <label>NIM</label>
    <input type="text" name="nim" value="<?= $data['nim']; ?>" required>

    <label>Nama</label>
    <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

    <label>Program Studi</label>
    <input type="text" name="prodi" value="<?= $data['prodi']; ?>" required>

    <label>Jenis Kelamin</label>
    <select name="jk">
        <option value="Laki-laki"   <?= ($data['jk']=="Laki-laki")?'selected':'';?>>Laki-laki</option>
        <option value="Perempuan"   <?= ($data['jk']=="Perempuan")?'selected':'';?>>Perempuan</option>
    </select>

    <label>Alamat</label>
    <textarea name="alamat" required><?= $data['alamat']; ?></textarea>

    <div class="button-row">
        <button type="submit">Update</button>
        <a href="list.php" class="btn-back">Kembali</a>
    </div>

</form>

</body>
</html>
