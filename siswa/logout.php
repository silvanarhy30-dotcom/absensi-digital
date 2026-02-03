<?php
// Memulai sesi
session_start();

// Menghapus semua variabel sesi
$_SESSION = [];

// Menghancurkan sesi
session_destroy();

// Mengarahkan kembali ke halaman login dengan pesan sukses (opsional)
echo "<script>
    alert('Anda telah berhasil keluar.');
    window.location.href = 'login.php';
</script>";
exit;
?>