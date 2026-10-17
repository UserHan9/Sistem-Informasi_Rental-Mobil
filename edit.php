<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM paket_rental WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama_paket  = $_POST['nama_paket'];
    $jenis_paket = $_POST['jenis_paket'];
    $durasi      = $_POST['durasi'];
    $harga       = $_POST['harga'];
    $ketentuan   = $_POST['ketentuan'];

    $stmt = $conn->prepare("UPDATE paket_rental SET nama_paket=?, jenis_paket=?, durasi=?, harga=?, ketentuan=? WHERE id=?");
    $stmt->bind_param("ssidsi", $nama_paket, $jenis_paket, $durasi, $harga, $ketentuan, $id);

    if ($stmt->execute()) {
        header("Location: read.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket Rental</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="sidebar">
        <h2>Rental Mobil System</h2>
        <nav>
            <a href="read.php">Daftar Paket Rental</a>
            <a href="tambah.php">Tambah Paket Rental</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="header-title">
                <h1>Edit Paket Rental</h1>
                <a href="read.php" class="btn btn-secondary">Batal</a>
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" id="nama_paket" name="nama_paket" value="<?= htmlspecialchars($data['nama_paket']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="jenis_paket">Jenis Paket</label>
                    <select id="jenis_paket" name="jenis_paket" required>
                        <option value="Lepas Kunci" <?= $data['jenis_paket'] == 'Lepas Kunci' ? 'selected' : ''; ?>>Lepas Kunci</option>
                        <option value="All-in" <?= $data['jenis_paket'] == 'All-in' ? 'selected' : ''; ?>>All-in</option>
                        <option value="Luar Kota" <?= $data['jenis_paket'] == 'Luar Kota' ? 'selected' : ''; ?>>Luar Kota</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="durasi">Durasi Sewa (Hari)</label>
                    <input type="number" id="durasi" name="durasi" value="<?= htmlspecialchars($data['durasi']); ?>" min="1" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($data['harga']); ?>" min="0" required>
                </div>

                <div class="form-group">
                    <label for="ketentuan">Ketentuan</label>
                    <textarea id="ketentuan" name="ketentuan"><?= htmlspecialchars($data['ketentuan']); ?></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-primary">Update Paket</button>
            </form>
        </div>
    </div>

</body>
</html>