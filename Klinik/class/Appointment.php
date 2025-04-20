<?php
require_once 'config/db.php';

class Appointment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllAppointments() {
        $stmt = $this->db->query("SELECT a.*, p.nama as nama_pasien, d.nama as nama_dokter 
                                  FROM appointment a 
                                  JOIN pasien p ON a.pasien_id = p.id 
                                  JOIN dokter d ON a.dokter_id = d.id
                                  ORDER BY a.tanggal, a.waktu");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchAppointments($keyword) {
        $stmt = $this->db->prepare("SELECT a.*, p.nama as nama_pasien, d.nama as nama_dokter 
                                    FROM appointment a 
                                    JOIN pasien p ON a.pasien_id = p.id 
                                    JOIN dokter d ON a.dokter_id = d.id
                                    WHERE p.nama LIKE ? OR d.nama LIKE ? OR a.keluhan LIKE ?
                                    ORDER BY a.tanggal, a.waktu");
        $param = "%$keyword%";
        $stmt->execute([$param, $param, $param]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAppointmentById($id) {
        $stmt = $this->db->prepare("SELECT * FROM appointment WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addAppointment($pasien_id, $dokter_id, $tanggal, $waktu, $keluhan) {
        $stmt = $this->db->prepare("INSERT INTO appointment (pasien_id, dokter_id, tanggal, waktu, keluhan) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$pasien_id, $dokter_id, $tanggal, $waktu, $keluhan]);
    }

    public function updateAppointment($id, $pasien_id, $dokter_id, $tanggal, $waktu, $keluhan) {
        $stmt = $this->db->prepare("UPDATE appointment SET pasien_id = ?, dokter_id = ?, tanggal = ?, waktu = ?, keluhan = ? WHERE id = ?");
        return $stmt->execute([$pasien_id, $dokter_id, $tanggal, $waktu, $keluhan, $id]);
    }

    public function deleteAppointment($id) {
        $stmt = $this->db->prepare("DELETE FROM appointment WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>