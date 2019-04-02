<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';

include_once 'objek/terminal.php';

$database = new Database();
$db = $database->getConnection();

$terminal = new Terminal($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id) &&
    !empty($data->jenis) &&
    !empty($data->nama_pp) &&
    !empty($data->alamat_pp) &&
    !empty($data->switching)
) {

    $terminal->id = $data->id;
    $terminal->jenis = $data->jenis;
    $terminal->nama_pp = $data->nama_pp;
    $terminal->alamat_pp = $data->alamat_pp;
    $terminal->switching = $data->switching;

    if ($terminal->create()) {

        http_response_code(201);

        echo json_encode(array("pesan" => "Terminal Berhasil Dibuat."));
    } else {

        http_response_code(503);

        echo json_encode(array("pesan" => "Terminal Gagal Dibuat. Silahkan Cek Kembali"));
    }
} else {

    http_response_code(400);

    echo json_encode(array("message" => "terminal Gagal Dibuat. Data Kurang Lengkap."));
}
