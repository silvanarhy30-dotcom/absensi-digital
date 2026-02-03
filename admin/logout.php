<?php
// File: admin/logout.php

// Memulai sesi
session_start();

// Menghapus semua data sesi admin
$_SESSION = [];

// Menghancurkan sesi
session_destroy();

// Menampilkan pesan sukses dan mengarahkan kembali ke login admin
echo "<script>
    alert('Admin telah berhasil logout.');
    window.location.href = 'login.php';
</script>";
exit;
?>