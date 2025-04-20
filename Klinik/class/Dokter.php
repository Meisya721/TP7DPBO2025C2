<?php
require_once 'config/db.php';

class Dokter {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllDokter() {
        $stmt = $this->db->query("SELECT * FROM dokter");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchDokter($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM dokter WHERE nama LIKE ? OR spesialisasi LIKE ?");
        $param = "%$keyword%";
        $stmt->execute([$param, $param]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDokterById($id) {
        $stmt = $this->db->prepare("SELECT * FROM dokter WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addDokter($nama, $spesialisasi, $jadwal_praktek, $telepon) {
        $stmt = $this->db->prepare("INSERT INTO dokter (nama, spesialisasi, jadwal_praktek, telepon) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nama, $spesialisasi, $jadwal_praktek, $telepon]);
    }

    public function updateDokter($id, $nama, $spesialisasi, $jadwal_praktek, $telepon) {
        $stmt = $this->db->prepare("UPDATE dokter SET nama = ?, spesialisasi = ?, jadwal_praktek = ?, telepon = ? WHERE id = ?");
        return $stmt->execute([$nama, $spesialisasi, $jadwal_praktek, $telepon, $id]);
    }

    public function deleteDokter($id) {
        $stmt = $this->db->prepare("DELETE FROM dokter WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>