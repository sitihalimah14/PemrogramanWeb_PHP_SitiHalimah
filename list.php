<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// tombol search
$cari = isset($_GET['cari'])? $_GET['cari'] : '';

if($cari){
    $data = mysqli_query($koneksi,"
        SELECT * FROM mahasiswa 
        WHERE nama LIKE '%$cari%' OR nim LIKE '%$cari%'
        ORDER BY id DESC
    ");
}else{
    $data = mysqli_query($koneksi,"
        SELECT * FROM mahasiswa 
        ORDER BY id DESC
    ");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
body{
    font-family: Poppins, sans-serif;
    background:#2A1D12;
    color:#F5EDE4;
    margin:0;
    padding:0;
}

/* Title */
h2{
    text-align:center;
    background:#3C2A20;
    margin:0;
    padding:25px;
    font-size:30px;
    color:#FFE9CF;
    font-weight:600;
    border-bottom:3px solid #281A12;
}

/* Top menu */
a{
    color:#FFE1BD;
    text-decoration:none;
    font-weight:600;
}
a:hover{
    color:#FFEECC;
}

/* Search bar */
form{
    width:90%;
    max-width:600px;
    margin:20px auto;
    text-align:center;
}

input[type="text"]{
    padding:12px;
    width:60%;
    border:none;
    border-radius:6px;
    background:#E7D8C8;
    font-family:Poppins;
    outline:none;
}
button{
    padding:12px 18px;
    border:none;
    border-radius:6px;
    background:#6E4B3A;
    color:white;
    cursor:pointer;
    font-size:15px;
    margin-left:6px;
}
button:hover{
    background:#8C624A;
}
form a{
    background:#5B3F31;
    padding:11px 15px;
    border-radius:6px;
    color:white;
}

/* Table */
table{
    width:95%;
    border-collapse:collapse;
    margin:20px auto;
    background:#3C2A20;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#5A3E2F;
    padding:14px;
    font-weight:600;
    color:#FFEBD3;
}
td{
    padding:12px;
    background:#442F23;
    border-bottom:1px solid #2C1C14;
}

/* Hover row */
tr:hover td{
    background:#5A3E2F;
}

/* Number center */
td:first-child{
    text-align:center;
}

/* Aksi */
td a{
    color:#FFDDBA;
}
td a:hover{
    color:#fff;
}
/* top button */
.top-btn{
    width:100%;
    display:flex;
    justify-content:flex-start; /* kiri */
    gap:10px;
    margin:0 0 20px 0; /* hilangkan auto center */
    flex-wrap:wrap;
}

.btn{
    padding:12px 20px;
    border-radius:8px;
    text-decoration:none;
    font-weight:600;
    font-size:15px;
    display:inline-block;
    box-shadow:0 2px 5px rgba(0,0,0,.3);
}

/* warna */
.brown{ background:#6E4B3A; color:#fff; }
.green{ background:#5A3E2F; color:#fff; }

/* hover */
.btn:hover{
    filter:brightness(.9);
}

/* mobile */
@media(max-width:600px){
    .top-btn{
        flex-direction:column;
    }
    .btn{
        width:100%;
        text-align:center;
    }
}
.aksi{
    display:flex;
    justify-content:center;
    gap:8px;
}

.btn-edit, .btn-delete{
    padding:8px 14px;
    border-radius:6px;
    font-size:14px;
    text-decoration:none;
    color:#FFECDC;
    font-weight:600;
}

/* Edit Button */
.btn-edit{
    background:#6E4B3A;
}
.btn-edit:hover{
    background:#8C624A;
}

/* Delete Button */
.btn-delete{
    background:#5B3F31;
}
.btn-delete:hover{
    background:#735043;
}


</style>

<title>Data Mahasiswa</title>
</head>
<body>
<h2>Data Mahasiswa</h2>

<!-- logout -->
<div class="top-btn">
    <a href="logout.php" class="btn brown">Logout</a>
    <a href="index.php" class="btn green">Tambah Data</a>
</div>

<br><br>

<!-- Form Search -->
<form method="GET" action="">
    <input type="text" name="cari" placeholder="Cari NIM / Nama..." 
           value="<?= htmlspecialchars($cari); ?>">
    <button type="submit">Search</button>
    <a href="list.php">Reset</a>
</form>

<br>

<table border="1" cellpadding="6">
<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Program Studi</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;
while($row = mysqli_fetch_assoc($data)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['prodi']; ?></td>
    <td><?= $row['jk']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td class="aksi">
    <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Anda yakin ingin Hapus data?')">Delete</a>
    </td>

</tr>
<?php } ?>

</table>
</body>
</html>
