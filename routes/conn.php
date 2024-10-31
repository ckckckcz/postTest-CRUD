<?php
// SQL Server connection details
$serverName = "RIOVALDOALFIYAN\MSQLRIO";
$database = "postTest";
$username = "";
$password = "";

// Connection string using SQLSRV driver
$connectionOptions = [
    "Database" => $database,
    "Uid" => $username,
    "PWD" => $password
];

// Establish connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
// if ($conn) {
//     echo "Connection established successfully.";
// } else {
//     echo "Connection failed.";
//     die(print_r(sqlsrv_errors(), true));
// }

// Close the connection
sqlsrv_close($conn);