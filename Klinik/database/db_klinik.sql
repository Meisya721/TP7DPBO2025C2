CREATE DATABASE klinik_db;
USE klinik_db;

CREATE TABLE pasien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    usia INT NOT NULL,
    alamat TEXT,
    telepon VARCHAR(15)
);

CREATE TABLE dokter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    spesialisasi VARCHAR(100) NOT NULL,
    jadwal_praktek VARCHAR(255) NOT NULL,
    telepon VARCHAR(15)
);

CREATE TABLE appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pasien_id INT NOT NULL,
    dokter_id INT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    keluhan TEXT,
    FOREIGN KEY (pasien_id) REFERENCES pasien(id) ON DELETE CASCADE,
    FOREIGN KEY (dokter_id) REFERENCES dokter(id) ON DELETE CASCADE
);

-- Data dummy untuk pasien
INSERT INTO pasien (nama, usia, alamat, telepon) VALUES
('Budi Santoso', 35, 'Jl. Kenanga No. 10', '081234567890'),
('Dewi Suryani', 42, 'Jl. Mawar No. 15', '085678901234'),
('Ahmad Ramadhan', 28, 'Jl. Melati No. 5', '087890123456');

-- Data dummy untuk dokter
INSERT INTO dokter (nama, spesialisasi, jadwal_praktek, telepon) VALUES
('Dr. Siti Aminah', 'Umum', 'Senin-Jumat, 08.00-14.00', '081122334455'),
('Dr. Agus Wijaya', 'Gigi', 'Senin-Rabu, 16.00-20.00', '082233445566'),
('Dr. Rini Kartika', 'Kandungan', 'Selasa-Kamis, 09.00-15.00', '083344556677');

-- Data dummy untuk appointment
INSERT INTO appointment (pasien_id, dokter_id, tanggal, waktu, keluhan) VALUES
(1, 1, '2025-04-21', '09:00:00', 'Demam dan batuk'),
(2, 3, '2025-04-22', '10:30:00', 'Konsultasi kehamilan'),
(3, 2, '2025-04-23', '17:00:00', 'Sakit gigi');