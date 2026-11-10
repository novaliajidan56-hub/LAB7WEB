<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
</head>
<body>
    <form method="POST" action="">
        <label for="nama">Nama: </label><br>
        <input id="nama" name="nama" type="text" required><br><br>
        
        <label for="prodi">Program Studi:</label><br>
        <input id="prodi" name="prodi" type="text" required><br><br>
        
        <button type="submit" name="kirim">Kirim Data</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        
        if ($nama === "" || $prodi === "") {
            echo "<p style='color: red;'>Semua kolom wajib diisi.</p>";
        } else {
            echo "<h3>Data diterima</h3>";
            echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
            echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") . "<br>";
        }
    }
    ?>
</body>
</html>