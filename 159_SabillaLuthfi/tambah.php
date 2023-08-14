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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: right;
        }
        .content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <span>Welcome, <?php echo $_SESSION["username"]; ?>! |</span>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h1 class="text-center">Tambah Kegiatan</h1>
        <a href="admin.php" class="btn btn-secondary mb-3">Kembali</a>
        <form id="addActivityForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; Sabilla Luthfi Rahmadhan 2023. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.getElementById("addActivityForm").addEventListener("submit", function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch("upload.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: "Success",
                        text: "Kegiatan berhasil ditambahkan!",
                        icon: "success",
                        allowOutsideClick: false,
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "admin.php";
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Kegiatan gagal ditambahkan.",
                        icon: "error",
                        allowOutsideClick: false,
                        confirmButtonText: "OK"
                    });
                }
            });
        });
    </script>
</body>
</html>
