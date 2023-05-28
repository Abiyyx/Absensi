<?php
session_start();

// Periksa apakah sesi siswa dan sesi hari telah dimulai
if (!isset($_SESSION['siswa']) || !isset($_SESSION['hari'])) {
    header("Location: login.php");
    exit();
}

// Tombol "Lihat Absen" mengarahkan ke halaman tampil_absen.php
if (isset($_POST['lihat_absen'])) {
    header("Location: tampil_absen.php");
    exit();
}

// Hapus sesi hari setelah konfirmasi
unset($_SESSION['hari']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Absen</title>
</head>
<body>
    <h1>Absensi Berhasil Disimpan</h1>
    <p>Terima kasih telah melakukan absensi.</p>

    <form method="POST" action="">
        <input type="submit" name="lihat_absen" value="Lihat Absen">
    </form>
</body>
</html>

