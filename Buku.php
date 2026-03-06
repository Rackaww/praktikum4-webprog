<?php
class Buku {
    private $conn;
    private $table_name = "buku";

    public $id;
    public $judul;
    public $isbn;
    public $penulis;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Method untuk mengambil semua data buku
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>