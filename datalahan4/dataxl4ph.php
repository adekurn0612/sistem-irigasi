<?php
require 'connection.php';

$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO($pdo, 'root', '');

if (!$connection) {
    die("Fatal Error: Connection Failed!");
}

$sql = "SELECT sensor_ph FROM coba WHERE nama = 'Lora 3'  ORDER BY id DESC LIMIT 10";
$result = $connection->query($sql);

// Buat array kosong untuk menampung data
$data = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Konversi nilai dari string ke integer
    $sensor_n = intval($row['sensor_ph']);
    // Tambahkan nilai ke dalam array
    $data[] = $sensor_n;
}

// Balik urutan elemen array urutan reverse akan mmebuat data dari yg paling lama ke terbaru dari kiri ke kanan
$data = array_reverse($data);

// Konversi array ke dalam format JSON
$json_dataph = json_encode($data);

// Tampilkan data dalam format JSON
// echo $json_dataph;
?>
