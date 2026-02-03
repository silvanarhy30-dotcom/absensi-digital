<?php
session_start();
if (!isset($_SESSION['admin_login'])) { header("Location: login.php"); exit; }
include '../config/config.php';

$query_siswa = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data User Siswa</title>
    <style>
        /* Sidebar sama dengan dashboard */
        body { margin: 0; display: flex; font-family: sans-serif; background: #f4f7f9; }
        .sidebar { width: 250px; height: 100vh; background: #263238; color: white; position: fixed; }
        .sidebar a { display: block; padding: 15px 25px; color: #b0bec5; text-decoration: none; border-bottom: 1px solid #37474f; }
        .main { margin-left: 250px; padding: 40px; width: 100%; }
        .card { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #1976d2; color: white; }
        tr:hover { background: #f1f8ff; }
        .pass-text { font-family: monospace; font-size: 11px; color: #777; word-break: break-all; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 style="text-align:center; padding: 20px; background:#1a237e;">ADMIN SMK 1</h3>
        <a href="dashboard.php">📊 Dashboard</a>
        <a href="infoUser.php" style="background: #37474f; color: white;">👥 Data User/Siswa</a>
        <a href="logout.php">🚪 Logout</a>
    </div>
    <div class="main">
        <div class="card">
            <h2>Daftar Akun Siswa Terdaftar</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Password (Hashed)</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($query_siswa)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama_lengkap']; ?></td>
                    <td><b><?php echo $row['username']; ?></b></td>
                    <td class="pass-text"><?php echo $row['password']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>