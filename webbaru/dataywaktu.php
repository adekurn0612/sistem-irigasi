<?php
require 'connection.php';

$pdo = "mysql:host=$servername; dbname=$dbname";
$connection = new PDO($pdo, 'root', '');

if (!$connection) {
    die("Fatal Error: Connection Failed!");
}

$sql2 = "SELECT timestamp FROM coba WHERE nama = 'Lora 1'  ORDER BY id DESC LIMIT 10";
$result = $connection->query($sql2);

// Buat array kosong untuk menampung data
$data2 = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Konversi nilai timestamp ke dalam format waktu dengan string H:i:s
    $waktu2 = date('H:i:s', strtotime($row['timestamp']));
    // Tambahkan nilai ke dalam array dengan format yang diinginkan
    $data2[] = "String('$waktu2')";
}

// Balik urutan array agar data terbaru berada di indeks pertama
$data2 = array_reverse($data2);

// Gabungkan array menjadi sebuah string dengan format yang diinginkan
$json_datawaktu = "[" . implode(",", $data2) . "]";

// Tampilkan data dalam format yang diinginkan
// echo $json_datawaktu;
?>
