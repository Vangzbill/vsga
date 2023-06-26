<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Luas Lingkaran</title>
</head>
<body>
    <h3>Kalkulator Luas Lingkaran</h3>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="jari_jari">Jari-jari Lingkaran:</label>
        <input type="text" name="jari_jari" id="jari_jari" required>
        <br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $r = floatval($_POST["jari_jari"]);

        $luas = 3.14 * pow($r, 2);

        echo "Luas lingkaran adalah: " . $luas;
    }
    ?>
</body>
</html>
