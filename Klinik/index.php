<?php
require_once 'class/Pasien.php';
require_once 'class/Dokter.php';
require_once 'class/Appointment.php';

$pasien = new Pasien();
$dokter = new Dokter();
$appointment = new Appointment();

// Handle Pasien CRUD
if (isset($_GET['page']) && $_GET['page'] == 'pasien') {
    if (isset($_GET['action'])) {
        // Handle Delete
        if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
            $pasien->deletePasien($_GET['id']);
            header('Location: ?page=pasien');
            exit;
        }
        
        // Handle Create
        if ($_GET['action'] == 'save' && isset($_POST['nama'])) {
            $pasien->addPasien($_POST['nama'], $_POST['usia'], $_POST['alamat'], $_POST['telepon']);
            header('Location: ?page=pasien');
            exit;
        }
        
        // Handle Update
        if ($_GET['action'] == 'update' && isset($_POST['id'])) {
            $pasien->updatePasien($_POST['id'], $_POST['nama'], $_POST['usia'], $_POST['alamat'], $_POST['telepon']);
            header('Location: ?page=pasien');
            exit;
        }
    }
}

// Handle Dokter CRUD
if (isset($_GET['page']) && $_GET['page'] == 'dokter') {
    if (isset($_GET['action'])) {
        // Handle Delete
        if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
            $dokter->deleteDokter($_GET['id']);
            header('Location: ?page=dokter');
            exit;
        }
        
        // Handle Create
        if ($_GET['action'] == 'save' && isset($_POST['nama'])) {
            $dokter->addDokter($_POST['nama'], $_POST['spesialisasi'], $_POST['jadwal_praktek'], $_POST['telepon']);
            header('Location: ?page=dokter');
            exit;
        }
        
        // Handle Update
        if ($_GET['action'] == 'update' && isset($_POST['id'])) {
            $dokter->updateDokter($_POST['id'], $_POST['nama'], $_POST['spesialisasi'], $_POST['jadwal_praktek'], $_POST['telepon']);
            header('Location: ?page=dokter');
            exit;
        }
    }
}

// Handle Appointment CRUD
if (isset($_GET['page']) && $_GET['page'] == 'appointment') {
    if (isset($_GET['action'])) {
        // Handle Delete
        if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
            $appointment->deleteAppointment($_GET['id']);
            header('Location: ?page=appointment');
            exit;
        }
        
        // Handle Create
        if ($_GET['action'] == 'save' && isset($_POST['pasien_id'])) {
            $appointment->addAppointment($_POST['pasien_id'], $_POST['dokter_id'], $_POST['tanggal'], $_POST['waktu'], $_POST['keluhan']);
            header('Location: ?page=appointment');
            exit;
        }
        
        // Handle Update
        if ($_GET['action'] == 'update' && isset($_POST['id'])) {
            $appointment->updateAppointment($_POST['id'], $_POST['pasien_id'], $_POST['dokter_id'], $_POST['tanggal'], $_POST['waktu'], $_POST['keluhan']);
            header('Location: ?page=appointment');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Klinik Sweet Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Selamat Menggunakan Sistem Manajemen Klinik Sweet Home</h2>
        <nav>
            <a href="?page=pasien">Pasien</a>
            <a href="?page=dokter">Dokter</a>
            <a href="?page=appointment">Appointment</a>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'pasien') {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'add') include 'view/add_pasien.php';
                    elseif ($_GET['action'] == 'edit') include 'view/edit_pasien.php';
                    else include 'view/pasien.php';
                } else {
                    include 'view/pasien.php';
                }
            }
            elseif ($page == 'dokter') {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'add') include 'view/add_dokter.php';
                    elseif ($_GET['action'] == 'edit') include 'view/edit_dokter.php';
                    else include 'view/dokter.php';
                } else {
                    include 'view/dokter.php';
                }
            }
            elseif ($page == 'appointment') {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'add') include 'view/add_appointment.php';
                    elseif ($_GET['action'] == 'edit') include 'view/edit_appointment.php';
                    else include 'view/appointment.php';
                } else {
                    include 'view/appointment.php';
                }
            }
        } else {
            echo "<p class='text-center'>Silakan pilih menu di atas untuk mengelola data.</p>";
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>