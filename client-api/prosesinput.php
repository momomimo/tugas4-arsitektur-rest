<?php
include 'vendor/autoload.php';
$id = $_POST['noid'];
$jenis = $_POST['jenis'];
$nama_pp = $_POST['nama_pp'];
$alamat_pp = $_POST['alamat_pp'];
$switching = $_POST['switching'];


use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;

$client = new Client(['headers' => ['Content-Type' => 'application/json']]);

$respon = $client->request('POST', 'https://momomimo1602webservice.000webhostapp.com/server-api/input.php', [
    'body' => json_encode([
        'id' => $id,
        'jenis' => $jenis,
        'nama_pp' => $nama_pp,
        'alamat_pp' => $alamat_pp,
        'switching' => $switching
    ])
]);
header("Location: index.php");
