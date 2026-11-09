<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <div class="card p-4">
    <h2><?= $row['judul'] ?></h2>
    <p>Penulis: <?= $row['penulis'] ?></p>
    <p>Kategori: <?= $row['kategori'] ?></p>
    <p>Harga: Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
    <p>Stok: <?= $row['stok'] ?></p>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </div>
</body>
</html>