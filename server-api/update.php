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
$terminal->jenis = $data->jenis;
$terminal->nama_pp = $data->nama_pp;
$terminal->alamat_pp = $data->alamat_pp;
$terminal->switching = $data->switching;

if ($terminal->update()) {

    http_response_code(200);

    echo json_encode(array("pesan" => "Terminal Berhasil Dirubah."));
} else {

    http_response_code(503);

    echo json_encode(array("pesan" => "Terminal Gagal Dirubah."));
}
