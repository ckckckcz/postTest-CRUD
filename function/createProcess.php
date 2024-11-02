<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO todos (judul, deskripsi) VALUES (?, ?)";
    $params = array($judul, $deskripsi);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        header("Location: ../index.php");
        exit();
    } else {
        // Tampilkan pesan kesalahan jika terjadi error
        echo "Terjadi kesalahan: " . print_r(sqlsrv_errors(), true);
    }

    // Membersihkan resource
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
