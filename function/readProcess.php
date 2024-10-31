<?php
include './routes/database.php';

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
        echo "Tugas tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak diberikan.";
    exit();
}
