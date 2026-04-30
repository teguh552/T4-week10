<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC");
$buku = $stmt->fetchAll();

$pesan = $_GET['pesan'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Koleksi Buku</h2>
        
        <?php if ($pesan == "tambah_sukses"): ?>
            <div class="alert alert-success alert-dismissible fade show">
                Buku berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php elseif ($pesan == "edit_sukses"): ?>
            <div class="alert alert-info">Buku berhasil diperbarui!</div>
        <?php elseif ($pesan == "hapus_sukses"): ?>
            <div class="alert alert-warning">Buku berhasil dihapus!</div>
        <?php endif; ?>

        <a href="create.php" class="btn btn-success mb-3"> + Tambah Buku Baru</a>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($buku) > 0): ?>
                    <?php $no = 1; 
                    foreach ($buku as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['judul']); ?></td>
                        <td><?= htmlspecialchars($row['pengarang']); ?></td>
                        <td><?= htmlspecialchars($row['penerbit']); ?></td>
                        <td><?= $row['tahun_terbit']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data buku.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="text-muted">Total Buku: <?= count($buku) ?> Buku</p>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>