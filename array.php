<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Array</title>
</head>
<?php
// Buat array dengan index nama dan umur
$data = array(
    array("nama" => "Amanda", "umur" => 19),
    array("nama" => "Rizky", "umur" => 20),
    array("nama" => "Yorina", "umur" =>18),
    array("nama" => "Prayoga", "umur" => 17),
);

// Konversi array menjadi format JSON
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Tampilkan JSON data
echo nl2br($json_data);
?>
</html>