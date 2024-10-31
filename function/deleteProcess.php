<?php
include '../routes/database.php';

if (isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);

    $query = "DELETE FROM todos WHERE id = ?";
    $params = [$id];

    $sql = sqlsrv_query($conn, $query, $params);

    if ($sql) {
        header("Location: ../index.php");
        exit();
    } else {
        $errors = print_r(sqlsrv_errors(), true);
        echo "<script>alert('$errors');</script>";
    }
} else {
    header("Location: ../not_found_route.php");
    exit();
}
