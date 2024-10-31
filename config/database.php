<?php

// $serverName = "RIOVALDOALFIYAN\MSQLRIO";
$serverName = "LAPTOP-V9Q55RPI";
$connectionInfo = [
    "Database" => "crud"
];

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn) {
    $isDbConnectionSuccess = true;
} else {
    $isDbConnectionSuccess = false;
}
