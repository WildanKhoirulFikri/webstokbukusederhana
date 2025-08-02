<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM buku WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok    = $_POST['stok'];

    $conn->query("UPDATE buku SET judul='$judul', penulis='$penulis', stok=$stok WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="form-container">
    <h2><i class="fas fa-pen"></i> Edit Buku</h2>
    <form method="post">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required>

        <label>Penulis:</label>
        <input type="text" name="penulis" value="<?= $data['penulis'] ?>" required>

        <label>Stok:</label>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required>

        <div class="form-actions">
            <button type="submit"><i class="fas fa-save"></i> Update</button>
            <a href="index.php" class="btn kembali"><i class="fas fa-arrow-left"></i> Batal</a>
        </div>
    </form>
</div>
</body>
</html>
