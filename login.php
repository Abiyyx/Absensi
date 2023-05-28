<?php
session_start();

// Data siswa (contoh)
$siswa = [
    'nama' => 'John Doe',
    'id' => '123456',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $id = $_POST['id'];

    // Periksa kecocokan data login
    if ($nama === $siswa['nama'] && $id === $siswa['id']) {
        $_SESSION['siswa'] = $siswa;
        header("Location: pilih_jadwal.php");
        exit();
    } else {
        $error = "Nama atau ID Siswa tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Siswa</title>
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

        input[type="text"] {
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
        <h2>Login Siswa</h2>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="id">ID Siswa:</label>
        <input type="text" id="id" name="id" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>

