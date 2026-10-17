<?php
include "koneksi.php";

$query = "SELECT * FROM paket_rental ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Paket Rental</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navigasi Sidebar -->
    <div class="sidebar">
        <h2>Rental Mobil System</h2>
        <nav>
            <a href="read.php" class="active">Daftar Paket Rental</a>
            <a href="tambah.php">Tambah Paket Rental</a>
        </nav>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <div class="container">
            <div class="header-title">
                <h1>Daftar Paket Rental</h1>
                <a href="tambah.php" class="btn btn-success">+ Tambah Paket Baru</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Jenis Paket</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Ketentuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><strong><?= htmlspecialchars($data['nama_paket']); ?></strong></td>
                        <td><span class="badge"><?= htmlspecialchars($data['jenis_paket']); ?></span></td>
                        <td><?= htmlspecialchars($data['durasi']); ?> Hari</td>
                        <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($data['ketentuan']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $data['id']; ?>" class="edit">Edit</a>
                            <a href="hapus.php?id=<?= $data['id']; ?>" class="hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data paket rental.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>