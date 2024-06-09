<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
    <style>
        body {
            margin: 0;
        }

        .img-container {
            display: flex; 
            flex-wrap: wrap; 
            justify-content: space-around; 
        }

        .Gambar-container img {
            width: 200px; 
            margin: 10px; 
        }
        
    </style>
</head>
<body>
    <?php 
    $fileList = glob('gambar/*');
    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            echo '<img src="'. $filename . '" alt="Gambar"><br>';
        }
    }
    ?>
</body>
</html>