<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian GET</title>
</head>
<body>
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">
        <button type="submit">Cari</button>
    </form>

    <?php
    if (isset($_GET["kata"]) && $_GET["kata"] !== "") {
        $kata = trim($_GET["kata"]);
        echo "<p>Kata kunci yang dicari: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
    }
    ?>
</body>
</html>