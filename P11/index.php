<!DOCTYPE html>
<html>
<head>
    <title>Data Printer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Data Printer</h2>
        <a href="add_printer.php" class="btn btn-primary mb-3">Tambah Printer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Merk</th>
                    <th>Warna</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "dts_produk");

                if (mysqli_connect_errno()) {
                    echo "Koneksi database gagal: " . mysqli_connect_error();
                    exit();
                }

                $query = "SELECT * FROM printer";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama_merk'] . "</td>";
                    echo "<td>" . $row['warna'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
