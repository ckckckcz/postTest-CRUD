<?php
include '../config/database.php';

// Syntax untuk memeriksa ID apakah ada / tidak ada
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Jadi guys ini adalah proses update data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // bandingkan dua nilai sekaligus memperhatikan tipe data
        // Proses pengambilan data dari inputan
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        // Query untuk mengupdate data
        $updateQuery = "UPDATE todos SET judul = ?, deskripsi = ? WHERE id = ?";
        $updateParams = array($judul, $deskripsi, $id);

        $updateStmt = sqlsrv_query($conn, $updateQuery, $updateParams);

        if ($updateStmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            // Jika update data berhasil langsung diarahkan ke index.php
            header("Location: ../index.php");
            exit();
        }
    }

    // Dimulai Dari Sini adalah pengambilan data dari database untuk ditampilkan pada inputan form

    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT * FROM todos WHERE id = ?";
    $params = array($id);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Ambil data untuk ditampilkan di form
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Jika data ditemukan, $row berisi data yang akan ditampilkan
    } else {
        // Kondisi jika data tidak ditemukan, tampilkan pesan error
        echo "
            <head>
                <title>Tugas tidak ditemukan!</title>
                <link href='https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css' rel='stylesheet' />
            </head>

            <body>
                <div class='max-w-md mx-auto bg-white shadow-lg rounded-lg p-6'>
                    <div class='bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg p-4'>
                        <h5 class='text-lg font-bold mb-3 text-center'>Data Tidak Bisa Ditemukan!</h5>
                        <p class='text-center mb-4'>
                            Mohon masukkan data ID yang sesuai!
                        </p>
                        <div class='text-center'>
                            <a href='../index.php' class='bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded'>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </body>
        ";
        exit();
    }
} else {
    // Redirect jika tidak ada ID yang valid di URL
    header("Location: ../pages/not_found_route.php");
    exit();
}
?>