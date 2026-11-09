<?php
include 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $harga   = $_POST['harga'];
    $stok    = $_POST['stok'];

    mysqli_query($conn, "UPDATE buku SET judul='$judul', penulis='$penulis',
                         harga=$harga, stok=$stok WHERE id_buku=$id");
    header("Location: index.php");
}

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
  <h1>Edit Buku</h1>
  <form method="post">
    <input type="text" name="judul" value="<?= $row['judul'] ?>" class="form-control mb-2">
    <input type="text" name="penulis" value="<?= $row['penulis'] ?>" class="form-control mb-2">
    <input type="number" name="harga" value="<?= $row['harga'] ?>" class="form-control mb-2">
    <input type="number" name="stok" value="<?= $row['stok'] ?>" class="form-control mb-2">
    <button type="submit" name="update" class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</body>
</html>