<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/database.php';
include_once 'objek/terminal.php';

$database = new Database();
$db = $database->getConnection();

$terminal = new Terminal($db);

$stmt = $terminal->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $terminal_arr = array();
    $terminal_arr["hasil"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $terminal_item = array(
            "id" => $id,
            "jenis" => $jenis,
            "nama_pp" => $nama_pp,
            "alamat_pp" => $alamat_pp,
            "switching" => $switching
        );

        array_push($terminal_arr["hasil"], $terminal_item);
    }


    http_response_code(200);

    echo json_encode($terminal_arr);
} else {

    http_response_code(404);

    echo json_encode(
        array("pesan" => "Data Tidak Ditemukan.")
    );
}
