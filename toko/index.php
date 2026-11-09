<?php include 'koneksi.php'; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Toko Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h1>Daftar Buku</h1>
  <a href="tambah.php" class="btn btn-success mb-3">+ Tambah</a>
  <table class="table table-bordered">
    <tr>
      <th>No</th><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM buku ORDER BY judul ASC");
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['judul'] ?></td>
      <td><?= $row['penulis'] ?></td>
      <td><?= $row['kategori'] ?></td>
      <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
      <td>
        <?= $row['stok'] ?>
        <?php if ($row['stok'] < 10) { ?>
          <span class="badge bg-danger">Hampir habis</span>
        <?php } ?>
      </td>
      <td>
        <a href="detail.php?id=<?= $row['id_buku'] ?>" class="btn btn-info btn-sm">Detail</a>
        <a href="edit.php?id=<?= $row['id_buku'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $row['id_buku'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>