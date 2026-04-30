<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC");
$semua_buku = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Koleksi Buku</h2>
        
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'tambah_sukses'): ?>
            <div class="alert alert-success">Buku baru berhasil ditambahkan!</div>
        <?php endif; ?>

        <a href="create.php" class="btn btn-primary mb-3"> + Tambah Buku Baru</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
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
                <?php if (count($semua_buku) > 0): ?>
                    <?php $no = 1; foreach ($semua_buku as $buku): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($buku['judul']); ?></td>
                        <td><?= htmlspecialchars($buku['pengarang']); ?></td>
                        <td><?= htmlspecialchars($buku['penerbit']); ?></td>
                        <td><?= $buku['tahun_terbit']; ?></td>
                        <td><?= $buku['stok']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data buku.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>