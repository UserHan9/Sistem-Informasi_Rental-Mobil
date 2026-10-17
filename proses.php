<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap input form atau menetapkan nilai default statis bila kosong
    $nama_paket  = !empty($_POST['nama_paket'])  ? trim($_POST['nama_paket'])  : 'Paket Hemat Luar Kota';
    $jenis_paket = !empty($_POST['jenis_paket']) ? trim($_POST['jenis_paket']) : 'Luar Kota';
    $durasi      = !empty($_POST['durasi'])      ? intval($_POST['durasi'])    : 1;
    $harga       = !empty($_POST['harga'])       ? intval($_POST['harga'])     : 400000;
    $ketentuan   = !empty($_POST['ketentuan'])   ? trim($_POST['ketentuan'])   : 'Termasuk BBM dan Supir.';

    $stmt = $conn->prepare("INSERT INTO paket_rental (nama_paket, jenis_paket, durasi, harga, ketentuan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssids", $nama_paket, $jenis_paket, $durasi, $harga, $ketentuan);

    if ($stmt->execute()) {
        header("Location: read.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
}
?>