<!DOCTYPE html>
<html>
<head>
    <title>Pemeriksaan Bilangan</title>
</head>
<body>
    <h3>Pemeriksaan Bilangan</h3>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="bilangan_a">Bilangan a:</label>
        <input type="text" name="bilangan_a" id="bilangan_a" required>
        <br>
        <label for="bilangan_b">Bilangan b:</label>
        <input type="text" name="bilangan_b" id="bilangan_b" required>
        <br>
        <input type="submit" value="Periksa">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = floatval($_POST["bilangan_a"]);
        $b = floatval($_POST["bilangan_b"]);

        if ($a == $b) {
            echo "Bilangan a sama dengan bilangan b";
        } elseif ($a > $b) {
            echo "Bilangan a lebih besar daripada bilangan b";
        } else {
            echo "Bilangan b lebih besar daripada bilangan a";
        }
    }
    ?>

</body>
</html>

