<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../models/Buku.php';

$database = new Database();
$db = $database->getConnection();
$buku = new Buku($db);

$stmt = $buku->read();
$num = $stmt->rowCount();

if($num > 0) {
    $buku_arr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $buku_item = array(
            "id" => $id,
            "judul" => $judul,
            "isbn" => $isbn,
            "penulis" => $penulis
        );
        array_push($buku_arr, $buku_item);
    }
    http_response_code(200);
    echo json_encode($buku_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Data buku tidak ditemukan."));
}
?>