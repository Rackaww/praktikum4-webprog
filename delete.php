<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");

include_once '../config/Database.php';
include_once '../models/Buku.php';

$database = new Database();
$db = $database->getConnection();
$buku = new Buku($db);

$data = json_decode(file_get_contents("php://input"));

$buku->id = $data->id;

if($buku->delete()) {
    http_response_code(200);
    echo json_encode(array("message" => "Buku berhasil dihapus."));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Gagal menghapus buku."));
}
?>