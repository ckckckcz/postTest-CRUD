<?php

include '../config/database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM todos WHERE id = ?";
    $params = array($id);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
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
    }
} else {
    header("Location: ../not_found_route.php");
    exit();
}
