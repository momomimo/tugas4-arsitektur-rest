<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objek/terminal.php';

$database = new Database();
$db = $database->getConnection();

$terminal = new Terminal($db);

$data = json_decode(file_get_contents("php://input"));

$terminal->id = $data->id;

if ($terminal->id != null) {
    if ($terminal->delete()) {
        http_response_code(200);

        echo json_encode(array("pesan" => "Terminal Berhasil diHapus."));
    } else {

        http_response_code(503);

        echo json_encode(array("pesan" => "Terminal Gagal dihapus."));
    }
} else {
    http_response_code(503);

    echo json_encode(array("pesan" => "ID Terminal Tidak Ditemukan."));
}
