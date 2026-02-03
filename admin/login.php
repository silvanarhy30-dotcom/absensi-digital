<?php
session_start();
include '../config/config.php';

if (isset($_POST['login_admin'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    // Cek login tanpa password_verify (sesuai request)
    $query = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin_login'] = true;
        $_SESSION['admin_user'] = $user;
        header("Location: dashboard.php");
        exit;
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Admin | SMK 1 Sejahtera</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #eceff1; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); width: 350px; border-top: 5px solid #01579b; }
        h2 { color: #01579b; text-align: center; margin-bottom: 25px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #cfd8dc; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; background: #0288d1; color: white; border: none; padding: 12px; border-radius: 6px; cursor: pointer; font-weight: bold; }
        button:hover { background: #01579b; }
        .error { color: #d32f2f; text-align: center; font-size: 14px; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Admin Panel</h2>
        <?php if(isset($error)) echo "<p class='error'>Username/Password Admin Salah!</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username Admin" required>
            <input type="password" name="password" placeholder="Password Admin" required>
            <button type="submit" name="login_admin">Login Admin</button>
        </form>
    </div>
</body>
</html>