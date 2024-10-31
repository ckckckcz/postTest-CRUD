<?php
include './routes/database.php'; // Menghubungkan ke file database Anda

// Memeriksa apakah ID ada dalam URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengambil ID dari URL dan mengubahnya menjadi integer

    // Query untuk mengambil data berdasarkan ID
    $query = "SELECT * FROM todos WHERE id = ?"; // Menggunakan placeholder
    $params = array($id); // Parameter untuk query

    $stmt = sqlsrv_query($conn, $query, $params); // Eksekusi query

    // Memeriksa apakah data ditemukan
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Menampilkan error jika query gagal
    }

    // Mengambil data
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    } else {
        echo "Tugas tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak diberikan.";
    exit();
}
?>