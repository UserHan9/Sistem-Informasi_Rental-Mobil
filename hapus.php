<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM paket_rental WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: read.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }
}
?>