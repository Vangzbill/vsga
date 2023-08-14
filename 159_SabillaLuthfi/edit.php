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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];

    $gambar = $_FILES["gambar"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);

    if (!empty($gambar)) {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
        $sql = "UPDATE kegiatan SET nama='$nama', gambar='$gambar', deskripsi='$deskripsi' WHERE id=$id";
    } else {
        $sql = "UPDATE kegiatan SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }

    exit();
}

$id = $_GET["id"];
$sql = "SELECT * FROM kegiatan WHERE id=$id";
$result = $conn->query($sql);
$kegiatan = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h2 class="my-4 text-center">Edit Kegiatan</h2>
        <a href="admin.php" class="btn btn-secondary mb-4">Kembali</a>
        <form id="editForm" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $kegiatan["id"]; ?>">
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kegiatan["nama"]; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
                <img src="uploads/<?php echo $kegiatan["gambar"]; ?>" alt="kegiatan Image" class="mt-2"
                    style="max-width: 260px; height: auto;">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                    required><?php echo $kegiatan["deskripsi"]; ?></textarea>
            </div>
            <button type="button" class="btn btn-primary" id="editButton">Simpan</button>
        </form>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; Sabilla Luthfi Rahmadhan 2023. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("editButton").addEventListener("click", function () {
            var form = document.getElementById("editForm");
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "edit.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        if (xhr.responseText === "success") {
                            Swal.fire({
                                title: "Success",
                                text: "Kegiatan berhasil diedit!",
                                icon: "success",
                                allowOutsideClick: false,
                                confirmButtonText: "OK"
                            }).then(function () {
                                window.location.href = "admin.php";
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Kegiatan gagal diedit!",
                                icon: "error",
                                allowOutsideClick: false,
                                confirmButtonText: "OK"
                            });
                        }
                    }
                }
            };

            xhr.send(formData);
        });
    </script>
</body>
</html>
