<?php
require_once 'config/db.php';

class Pasien {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPasien() {
        $stmt = $this->db->query("SELECT * FROM pasien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPasien($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM pasien WHERE nama LIKE ? OR alamat LIKE ?");
        $param = "%$keyword%";
        $stmt->execute([$param, $param]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPasienById($id) {
        $stmt = $this->db->prepare("SELECT * FROM pasien WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPasien($nama, $usia, $alamat, $telepon) {
        $stmt = $this->db->prepare("INSERT INTO pasien (nama, usia, alamat, telepon) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nama, $usia, $alamat, $telepon]);
    }

    public function updatePasien($id, $nama, $usia, $alamat, $telepon) {
        $stmt = $this->db->prepare("UPDATE pasien SET nama = ?, usia = ?, alamat = ?, telepon = ? WHERE id = ?");
        return $stmt->execute([$nama, $usia, $alamat, $telepon, $id]);
    }

    public function deletePasien($id) {
        $stmt = $this->db->prepare("DELETE FROM pasien WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>