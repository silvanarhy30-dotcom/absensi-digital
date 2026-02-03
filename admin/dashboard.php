<?php
session_start();
if (!isset($_SESSION['admin_login'])) { header("Location: login.php"); exit; }
include '../config/config.php';

// Hitung total siswa
$res_siswa = mysqli_query($conn, "SELECT COUNT(*) as total FROM siswa");
$total_siswa = mysqli_fetch_assoc($res_siswa)['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Admin Dashboard</title>
    <style>
        body { margin: 0; display: flex; font-family: sans-serif; background: #f4f7f9; }
        .sidebar { width: 250px; height: 100vh; background: #263238; color: white; position: fixed; }
        .sidebar h3 { padding: 20px; background: #1a237e; margin: 0; text-align: center; }
        .sidebar a { display: block; padding: 15px 25px; color: #b0bec5; text-decoration: none; border-bottom: 1px solid #37474f; }
        .sidebar a:hover { background: #37474f; color: white; }
        .main { margin-left: 250px; padding: 40px; width: 100%; }
        .card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .stat-box { background: #e3f2fd; padding: 20px; border-radius: 8px; width: 200px; border-left: 5px solid #1976d2; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>ADMIN SMK 1</h3>
        <a href="dashboard.php">📊 Dashboard</a>
        <a href="infoUser.php">👥 Data User/Siswa</a>
        <a href="logout.php" style="color: #ff8a65;">🚪 Logout</a>
    </div>
    <div class="main">
        <div class="card">
            <h1>Selamat Datang Admin!</h1>
            <div class="stat-box">
                <small>Total Siswa Terdaftar</small>
                <h2><?php echo $total_siswa; ?> Siswa</h2>
            </div>
        </div>
    </div>
</body>
</html>