<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket Rental</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="sidebar">
        <h2>Rental Mobil System</h2>
        <nav>
            <a href="read.php">Daftar Paket Rental</a>
            <a href="tambah.php" class="active">Tambah Paket Rental</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="header-title">
                <h1>Tambah Paket Rental</h1>
                <a href="read.php" class="btn btn-secondary">Kembali</a>
            </div>

            <form action="proses.php" method="POST">
                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" id="nama_paket" name="nama_paket" placeholder="Contoh: Paket Weekend Lepas Kunci" required>
                </div>

                <div class="form-group">
                    <label for="jenis_paket">Jenis Paket</label>
                    <select id="jenis_paket" name="jenis_paket" required>
                        <option value="Lepas Kunci">Lepas Kunci</option>
                        <option value="All-in">All-in</option>
                        <option value="Luar Kota">Luar Kota</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="durasi">Durasi Sewa (Hari)</label>
                    <input type="number" id="durasi" name="durasi" placeholder="Contoh: 1" min="1" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" placeholder="Contoh: 350000" min="0" required>
                </div>

                <div class="form-group">
                    <label for="ketentuan">Ketentuan & Persyaratan</label>
                    <textarea id="ketentuan" name="ketentuan" placeholder="Masukkan ketentuan paket sewa..."></textarea>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">Simpan Paket</button>
            </form>
        </div>
    </div>

</body>
</html>