<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok    = $_POST['stok'];

    $conn->query("INSERT INTO buku (judul, penulis, stok) VALUES ('$judul', '$penulis', '$stok')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="form-container">
    <h2><i class="fas fa-plus"></i> Tambah Buku</h2>
    <form method="post">
        <label>Judul:</label>
        <input type="text" name="judul" required>

        <label>Penulis:</label>
        <input type="text" name="penulis" required>

        <label>Stok:</label>
        <input type="number" name="stok" required>

        <div class="form-actions">
            <button type="submit"><i class="fas fa-save"></i> Simpan</button>
            <a href="index.php" class="btn kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok    = $_POST['stok'];

    $conn->query("INSERT INTO buku (judul, penulis, stok) VALUES ('$judul', '$penulis', '$stok')");
    header("Location: index.php");
}
?>
