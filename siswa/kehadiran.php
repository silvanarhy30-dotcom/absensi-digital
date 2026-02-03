<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$id_siswa = $_SESSION['id_siswa'];
$tgl_sekarang = date('Y-m-d');

// Proses Absen
if (isset($_POST['absen'])) {
    $jam = date('H:i:s');
    $sql = "INSERT INTO presensi (siswa_id, tanggal, jam_masuk, keterangan) VALUES ('$id_siswa', '$tgl_sekarang', '$jam', 'Hadir')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berhasil Absen!'); window.location='kehadiran.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$riwayat = mysqli_query($conn, "SELECT * FROM presensi WHERE siswa_id = '$id_siswa' ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kehadiran</title>
    <style>
        body { display: flex; font-family: sans-serif; margin: 0; background: #f0f4f8; }
        .sidebar { width: 250px; height: 100vh; background: #0d47a1; color: white; position: fixed; }
        .sidebar a { display: block; padding: 15px; color: white; text-decoration: none; border-bottom: 1px solid #1976d2; }
        .main { margin-left: 250px; padding: 30px; width: 100%; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .btn { background: #2196f3; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table th, table td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        table th { background: #e3f2fd; }
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
            <h3>Form Absensi Hari Ini</h3>
            <?php 
            $cek = mysqli_query($conn, "SELECT * FROM presensi WHERE siswa_id = '$id_siswa' AND tanggal = '$tgl_sekarang'");
            if (mysqli_num_rows($cek) > 0) {
                echo "<p style='color:green'><b>Anda sudah absen hari ini.</b></p>";
            } else {
                echo '<form method="POST"><button type="submit" name="absen" class="btn">Klik Untuk Absen</button></form>';
            }
            ?>
        </div>
        <div class="card">
            <h3>Riwayat Absen</h3>
            <table>
                <tr><th>Tanggal</th><th>Jam</th><th>Status</th></tr>
                <?php while($row = mysqli_fetch_assoc($riwayat)) : ?>
                <tr>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['jam_masuk']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>