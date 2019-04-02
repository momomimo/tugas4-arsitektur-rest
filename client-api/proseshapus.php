<?php
include 'vendor/autoload.php';
$id = $_POST['noid'];

use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;

$client = new Client(['headers' => ['Content-Type' => 'application/json']]);

$promise = $client->request('DELETE', 'https://momomimo****************.000webhostapp.com/server-api/hapus.php', [
    'body' => json_encode([
        'id' => $id
    ])
]);

header("Location: index.php");
