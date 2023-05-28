<?php
session_start();

// Periksa apakah sesi siswa telah dimulai
if (!isset($_SESSION['siswa'])) {
    header("Location: login.php");
    exit();
}

// Tombol "Kembali" mengarahkan kembali ke halaman login
if (isset($_POST['kembali'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$absensi = isset($_SESSION['siswa']['absen']) ? $_SESSION['siswa']['absen'] : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tampil Absen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
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
    <h1>Absensi Siswa</h1>
    <table>
        <tr>
            <th>Hari</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($absensi as $hari => $keterangan) : ?>
            <tr>
                <td><?php echo $hari; ?></td>
                <td><?php echo $keterangan; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method="POST" action="">
        <input type="submit" name="kembali" value="Kembali">
    </form>
</body>
</html>

