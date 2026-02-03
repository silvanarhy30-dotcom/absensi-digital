<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | SMK 1 Sejahtera</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .hero {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 500px;
        }
        .hero h1 {
            color: #0d47a1;
            margin-bottom: 10px;
        }
        .hero p {
            color: #555;
            margin-bottom: 30px;
        }
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-login {
            background-color: #2196f3;
            color: white;
        }
        .btn-login:hover {
            background-color: #1976d2;
        }
        .btn-regis {
            border: 2px solid #2196f3;
            color: #2196f3;
        }
        .btn-regis:hover {
            background-color: #e3f2fd;
        }
    </style>
</head>
<body>

    <div class="hero">
        <img src="https://via.placeholder.com/100/2196f3/ffffff?text=SMK" alt="Logo SMK" style="border-radius: 50%; margin-bottom: 20px;">
        <h1>E-Absensi Digital</h1>
        <p>Sistem manajemen kehadiran siswa SMK 1 Sejahtera yang cepat, akurat, dan transparan.</p>
        
        <div class="btn-group">
            <a href="siswa/login.php" class="btn btn-login">Masuk Siswa</a>
            <a href="siswa/registrasi.php" class="btn btn-regis">Daftar Akun</a>
        </div>
    </div>

</body>
</html>