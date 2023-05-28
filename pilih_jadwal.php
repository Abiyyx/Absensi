<?php
session_start();

// Periksa apakah sesi siswa telah dimulai
if (!isset($_SESSION['siswa'])) {
    header("Location: login.php");
    exit();
}

// Data jadwal (contoh)
$jadwal = [
    'Senin' => 'Matematika',
    'Selasa' => 'Bahasa Inggris',
    'Rabu' => 'Fisika',
    // Tambahkan jadwal lain sesuai kebutuhan
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hari = $_POST['hari'];

    // Validasi apakah hari yang dipilih ada dalam data jadwal
    if (array_key_exists($hari, $jadwal)) {
        $_SESSION['hari'] = $hari;
        header("Location: isi_absen.php");
        exit();
    } else {
        $error = "Hari tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pilih Jadwal</title>
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

        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h2>Pilih Jadwal</h2>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <label for="hari">Hari:</label>
        <select id="hari" name="hari" required>
            <option value="">Pilih Hari</option>
            <?php foreach ($jadwal as $hari => $mataPelajaran) : ?>
                <option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Pilih">
    </form>
</body>
</html>

