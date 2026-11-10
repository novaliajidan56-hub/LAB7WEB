<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "")

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") $error[] = "NIM wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    if (empty($error)) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .error { color: red; }
        .success { background: #e2f0d9; padding: 15px; border: 1px solid #c8e1b7; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Formulir Data Mahasiswa</h2>
    
    <!-- Tampilkan Pesan Error jika ada -->
    <?php if (!empty($error)): ?>
        <div class="error">
            <ul>
                <?php foreach ($error as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Input -->
    <form method="POST" action="">
        <label>Nama Lengkap:<br><input type="text" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" required></label><br><br>
        <label>NIM:<br><input type="text" name="nim" value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>" required></label><br><br>
        <label>Program Studi:<br><input type="text" name="prodi" value="<?= htmlspecialchars($_POST['prodi'] ?? '') ?>" required></label><br><br>
        <label>Semester (1-14):<br><input type="number" name="semester" min="1" max="14" value="<?= htmlspecialchars($_POST['semester'] ?? '') ?>" required></label><br><br>
        <label>Email:<br><input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required></label><br><br>
        
        <button type="submit">Kirim Data</button>
        <button type="reset">Reset Form</button>
    </form>

    <!-- Tampilkan Ringkasan Data jika Valid -->
    <?php if ($data): ?>
        <div class="success">
            <h3>Ringkasan Data Mahasiswa Berhasil Disimpan</h3>
            <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>NIM:</strong> <?= htmlspecialchars($data['nim'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Program Studi:</strong> <?= htmlspecialchars($data['prodi'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Semester:</strong> <?= $data['semester'] ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    <?php endif; ?>
</body>
</html>