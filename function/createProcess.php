<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // bandingkan dua nilai tanpa memperhatikan tipe data
    // Ini proses pengambilan data pada inputan form
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Proses menjalankan query untuk menambahkan data pada tabel todos 
    $sql = "INSERT INTO todos (judul, deskripsi) VALUES (?, ?)"; // ini syntax nya
    $params = array($judul, $deskripsi);

    // Mengeksekusi query SQL dengan mengirimkan koneksi database ($conn), query ($sql), dan parameter ($params)
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        // Jika query berhasil, dan data berhasil disimpan langsung diarahkan ke index
        header("Location: ../index.php");
        exit();
    } else {
        // Menampilkan pesan kesalahan beserta detail error jika terjadi kegagalan dalam eksekusi query
        echo "Terjadi kesalahan: " . print_r(sqlsrv_errors(), true);
    }

    // Membersihkan resource
    sqlsrv_free_stmt($stmt);
    // Membersihkan statement resource setelah digunakan
    sqlsrv_close($conn);
    // Menutup koneksi database untuk membebaskan resource, biar tidak berats
}
