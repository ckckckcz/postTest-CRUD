<?php

$serverName = "RIOVALDOALFIYAN\MSQLRIO";
$connectionInfo = [
    "Database" => "crud"
];

$conn = sqlsrv_connect($serverName, $connectionInfo);

// if ($conn) {
//     echo "Koneksi ke database berhasil! hore";
// } else {
//     echo "Koneksi ke database gagal: ";
//     die(print_r(sqlsrv_errors(), true));
// }
?>