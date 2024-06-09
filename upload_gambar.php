<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="233307049">
    <meta name="author" content="Fandhi Syahru Rishaleh">
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label for="gambar1">Pilih Gambar yang akan diupload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php
    $target_dir = "gambar/";
    $uploadOk = 1;
    $tipeGambar = "";

    if(isset($_POST["submit"])) {
        // Memeriksa apakah file adalah gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            echo "File berupa citra/gambar - " . $check["mime"] . ".";
            $uploadOk = 1;
            $tipeGambar = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Memeriksa apakah file sudah ada
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Memeriksa ukuran file
        if ($_FILES["gambar"]["size"] > 5000000) { // 5MB
            echo "Sorry, file Anda terlalu besar.";
            $uploadOk = 0;
        }

        // Memeriksa tipe file
        if($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "jpeg" && $tipeGambar != "gif") {
            echo "Sorry, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Memeriksa apakah $uploadOk bernilai 0 karena kesalahan
        if ($uploadOk == 0) {
            echo "Sorry, file Anda gagal diupload.";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "File ". htmlspecialchars(basename($_FILES["gambar"]["name"])). " berhasil diupload.";
            } else {
                echo "Sorry, ada error saat mengupload file.";
            }
        }
    }
    ?>
</body>
</html>
