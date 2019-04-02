<?php
 // required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objek/terminal.php';

$database = new Database();
$db = $database->getConnection();

$terminal = new Terminal($db);

$terminal->id = isset($_GET['id']) ? $_GET['id'] : die();
$terminal->readID();

if ($terminal->nama_pp != null) {
    $terminal_arr = array(
        "id" => $terminal->id,
        "jenis" => $terminal->jenis,
        "nama_pp" => $terminal->nama_pp,
        "alamat_pp" => $terminal->alamat_pp,
        "switching" => $terminal->switching
    );

    http_response_code(200);

    echo json_encode($terminal_arr);
} else {
    http_response_code(404);

    echo json_encode(array("pesan" => "ID Terminal Tidak Ditemukan"));
}
