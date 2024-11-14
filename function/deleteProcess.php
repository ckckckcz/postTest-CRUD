<?php

include '../config/database.php';

if (isset($_POST['id'])) { // memeriksa keberadaaan variabel
    // Memeriksa apakah parameter 'id' yang dikirm dari metode POST du lihat_detail.php
    $id = htmlspecialchars($_POST['id']);

    // Persiapan query SQL untuk menjalankan perintah hapus data dari tabel 'todos' berdasarkan 'id'
    $query = "DELETE FROM todos WHERE id = ?";
    $params = [$id];

    // Menjalankan query SQL dengan koneksi ($conn), query ($query), dan parameter ($params)
    $sql = sqlsrv_query($conn, $query, $params);

    if ($sql) {
        // Jika penghapusan berhasil, arahkan pengguna ke halaman index.php, redirect
        header("Location: ../index.php");
        exit();
    } else {
        // Jika terjadi error, tampilkan pesan kesalahan dengan menampilkan detail error
        $errors = print_r(sqlsrv_errors(), true);
        echo "<script>alert('$errors');</script>";
    }
} else {
    header("Location: ../pages/not_found_route.php");
    exit();
}
