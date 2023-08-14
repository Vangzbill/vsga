<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Hapus</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "159_sabillaluthfi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];

    $sql = "DELETE FROM kegiatan WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
                Swal.fire({
                    title: "Success",
                    text: "Kegiatan berhasil dihapus!",
                    icon: "success",
                    allowOutsideClick: false,
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "admin.php";
                });
            </script>';
    } else {
        echo '<script>
                Swal.fire({
                    title: "Error",
                    text: "Gagal saat menghapus Kegiatan!",
                    icon: "error",
                    allowOutsideClick: false,
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "admin.php";
                });
            </script>';
    }

    $conn->close();
    ?>
</body>
</html>