<?php
$conn = mysqli_connect("localhost", "root", "", "rental");

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>