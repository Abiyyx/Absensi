<?php
session_start();

// Periksa apakah sesi siswa dan sesi hari telah dimulai
if (!isset($_SESSION['siswa']) || !isset($_SESSION['hari'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = $_POST['keterangan'];

    // Simpan absensi ke dalam sesi siswa
    $_SESSION['siswa']['absen'][$_SESSION['hari']] = $keterangan;

    header("Location: konfirmasi_absen.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Isi Absen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h2>Isi Absen - <?php echo $_SESSION['hari']; ?></h2>
        <label>
            <input type="radio" name="keterangan" value="Hadir" required>
            Hadir
        </label>
        <label>
            <input type="radio" name="keterangan" value="Tidak Hadir">
            Tidak Hadir
        </label>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

