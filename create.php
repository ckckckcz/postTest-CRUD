<?php
include './routes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO todos (judul, deskripsi) VALUES (?, ?)";
    $params = array($judul, $deskripsi);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        // Jika berhasil, arahkan ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . print_r(sqlsrv_errors(), true);
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">
            <h1
                class="mb-2 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">
                Rencanakan Hari Anda</h1>
            <p class="text-md font-normal text-gray-500 lg:text-lg dark:text-gray-400">Setiap tugas yang Anda tulis
                adalah langkah menuju kesuksesan!</p>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <form action="create.php" method="POST" class="text-lg">
                <div class="mb-5">
                    <label for="judul" class="block mb-2 font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" id="judul" name="judul" placeholder="Masukkan Judul" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="mb-5">
                    <label for="deskripsi"
                        class="block mb-2 font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Keterangan" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buat
                    Tugas</button>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>