<?php
session_start();
include '../config/config.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$user'");
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id_siswa'] = $row['id']; // ID dari tabel siswa
            $_SESSION['nama'] = $row['nama_lengkap'];
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login | SMK 1 Sejahtera</title>
    <style>
        body { font-family: sans-serif; background: #e3f2fd; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 320px; }
        h2 { color: #1565c0; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; background: #1976d2; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        .error { color: red; font-size: 13px; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login Siswa</h2>
        <?php if(isset($error)) echo "<p class='error'>Username/Password Salah!</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Masuk</button>
        </form>
    </div>
</body>
</html>