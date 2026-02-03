<?php
session_start();
include '../config/config.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <style>
        body { display: flex; font-family: sans-serif; margin: 0; background: #f0f4f8; }
        .sidebar { width: 250px; height: 100vh; background: #0d47a1; color: white; position: fixed; }
        .sidebar a { display: block; padding: 15px; color: white; text-decoration: none; border-bottom: 1px solid #1976d2; }
        .sidebar a:hover { background: #1976d2; }
        .main { margin-left: 250px; padding: 30px; width: 100%; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 style="text-align:center">SMK 1 Sejahtera</h3>
        <a href="dashboard.php">Dashboard</a>
        <a href="kehadiran.php">Kehadiran</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="main">
        <div class="card">
            <h1>Selamat Datang, <?php echo $nama; ?>!</h1>
            <p>Pilih menu <b>Kehadiran</b> untuk melakukan absensi hari ini.</p>
        </div>
    </div>
</body>
</html>