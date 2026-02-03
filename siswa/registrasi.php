<?php
include '../config/config.php';
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO siswa (nama_lengkap, username, password) VALUES ('$nama', '$user', '$pass')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi Berhasil!'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Registrasi SMK 1 Sejahtera</title>
    <style>
        body { font-family: sans-serif; background: #e3f2fd; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        h2 { color: #1976d2; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #bbdefb; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; background: #2196f3; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        button:hover { background: #1976d2; }
        a { display: block; text-align: center; margin-top: 10px; color: #1976d2; text-decoration: none; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Registrasi Siswa</h2>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Daftar</button>
        </form>
        <a href="login.php">Sudah punya akun? Login</a>
    </div>
</body>
</html>