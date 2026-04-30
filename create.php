<?php
require_once 'config/database.php';
$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    if (!empty($judul) && !empty($pengarang) && !empty($penerbit) && !empty($tahun_terbit) && !empty($stok)) {
        $stmt = $pdo->prepare("INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, stok) VALUES (:judul, :pengarang, :penerbit, :tahun_terbit, :stok)");
        $stmt->execute([
            ':judul' => $judul,
            ':pengarang' => $pengarang,
            ':penerbit' => $penerbit,
            ':tahun_terbit' => $tahun_terbit,
            ':stok' => $stok
        ]);
        header("Location: index.php?pesan=tambah_sukses");
        exit;
    } else {
        $pesan = "Semua field wajib diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <h2>Tambah Buku</h2>
        <?php if ($pesan): ?>
            <div class="alert alert-danger"><?= $pesan ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
        