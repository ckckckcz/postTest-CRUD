<?php

include '../config/database.php';

if (isset($_GET['id'])) {
    // Memeriksa parameter 'id' dikirim melalui metode GET
    $id = intval($_GET['id']); // konversi nilai menjadi bilangan bulat (int)

    // Siap-siap query SQL untuk mengambil data dari tabel 'todos' berdasarkan 'id'
    $query = "SELECT * FROM todos WHERE id = ?";
    $params = array($id);

    // Menjalankan query SQL dengan koneksi ($conn), query ($query), dan parameter ($params).
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        // Jika terjadi kesalahan saat menjalankan query, tampilkan detail kesalahan
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // nah pada if ini kenapa kosong ??, jadi karena gunanya cuman menampilkan data dari tabel, jadi cuman butuh pengecekkan ID jika ID nya ditemukan
        // ya data pada ID itu ditampilkan pada inputan form.... cuman gitu aja sihhh
    } else {
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
                            <a href='/' class='bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded'>
                                Beranda
                            </a>
                        </div>
                </div>
            </body>
        ";
        exit();
        // Jika data dengan 'id' tersebut tidak ditemukan, tampilkan pesan bahwa data tidak ditemukan
    }
} else {
    header("Location: ../not_found_route.php");
    exit();
}

