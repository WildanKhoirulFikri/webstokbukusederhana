<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Stok Buku</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h1><i class="fas fa-book"></i> Daftar Stok Buku</h1>

    <div class="top-bar">
        <div class="search-wrapper">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="search" placeholder="Cari judul atau penulis...">
            </div>
        </div>
        <a href="tambah.php" class="btn tambah"><i class="fas fa-plus"></i> Tambah Buku</a>
    </div>

    <div id="hasil">
        <table class="center-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM buku");
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>$no</td>
                        <td>{$row['judul']}</td>
                        <td>{$row['penulis']}</td>
                        <td>{$row['stok']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn edit'><i class='fas fa-pen'></i> Edit</a>
                            <a href='hapus.php?id={$row['id']}' class='btn hapus' onclick='return confirm(\"Yakin ingin menghapus?\")'><i class='fas fa-trash'></i> Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('search').addEventListener('keyup', function () {
    var keyword = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'cari.php?q=' + encodeURIComponent(keyword), true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('hasil').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});
</script>
</body>
</html>
