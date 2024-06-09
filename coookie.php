<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login dengan Cookies</title>
</head>
<body>
    <?php
    $message = "";
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    if (isset($_COOKIE['nama']) && isset($_COOKIE['email'])) {
        $nama = $_COOKIE['nama'];
        $email = $_COOKIE['email'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_COOKIE['nama']) && !isset($_COOKIE['email'])) {
            // Set cookie dengan durasi 60 detik
            setcookie("nama", $nama, time() + 60, "/");
            setcookie("email", $email, time() + 60, "/");

            if (isset($_COOKIE['nama']) && isset($_COOKIE['email'])) {
                $message = "Data identitas Anda telah disimpan dalam cookies.";
            } else {
                $message = "Data identitas tidak ditemukan dalam cookies.";
            }
        } else {
            if ($nama == $_COOKIE['nama'] && $email == $_COOKIE['email']) {
                $message = "Data identitas Anda telah disimpan dalam cookies.";
            } else {
                $message = "Data identitas tidak ditemukan dalam cookies.";
            }
        }
    }
    ?>
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php

    echo $message;
    ?>
</body>
</html>