<?php
// Mengimpor kode program yang ada di database.php
include '../routes/database.php'; // Periksa kembali jalur ini

// Memeriksa apakah ada data bernama 'id'
if (isset($_POST['id'])) {
    // Mengambil value bersih dari $_POST ke dalam variabel
    $id = htmlspecialchars($_POST['id']); // Mengambil ID yang dikirim dari formulir

    // Query SQL untuk menghapus data
    $query = "DELETE FROM todos WHERE id = ?";
    // Parameter atau data yang akan dimasukkan ke dalam tanda tanya (?) di query
    $params = [$id];

    // Eksekusi query
    $sql = sqlsrv_query($conn, $query, $params);

    // Jika query berhasil, kembali ke halaman index
    if ($sql) {
        header("Location: ../index.php");
        exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
    } else {
        $errors = print_r(sqlsrv_errors(), true);
        echo "<script>alert('$errors');</script>";
    }
} else {
    echo "ID tidak diberikan.";
}
