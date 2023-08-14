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

$sql = "SELECT * FROM kegiatan";
$result = $conn->query($sql);
$kegiatan = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
        .kegiatan {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 20px;
        }
        .kegiatan img {
            max-width: 260px;
            height: auto;
            margin-bottom: 10px;
        }
        .kegiatan-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .kegiatan {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #333;
            border-radius: 4px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="header">
        <span>Welcome, <?php echo $_SESSION["username"]; ?>! |</span>
        <a href="#" onclick="confirmLogout()">Logout</a>
    </div>

    <div class="content">
        <h1 class="text-center">Daftar Kegiatan</h1>
        <div class="actions mb-3">
            <a class="btn btn-success" href="tambah.php">+ Tambah kegiatan</a>
        </div>
        <?php if (empty($kegiatan)) : ?>
            <p>Tidak ada data kegiatan saat ini.</p>
        <?php else : ?>
            <div class="kegiatan-container">
                <?php foreach ($kegiatan as $kegiatan) : ?>
                    <div class="kegiatan">
                        <h3><?php echo $kegiatan["nama"]; ?></h3>
                        <img src="uploads/<?php echo $kegiatan["gambar"]; ?>" alt="kegiatan Image">
                        <p><?php echo $kegiatan["deskripsi"]; ?></p>
                        <div class="actions">
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $kegiatan["id"]; ?>">Edit</a>
                            <a class="btn btn-danger" href="#" onclick="confirmDelete(<?php echo $kegiatan["id"]; ?>)" >Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; Sabilla Luthfi Rahmadhan 2023. All rights reserved.</p>
        </div>
    </footer>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#333" fill-opacity="1" d="M0,192L30,192C60,192,120,192,180,170.7C240,149,300,107,360,112C420,117,480,171,540,181.3C600,192,660,160,720,160C780,160,840,192,900,186.7C960,181,1020,139,1080,117.3C1140,96,1200,96,1260,122.7C1320,149,1380,203,1410,229.3L1440,256L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Kamu tidak bisa mengembalikan data terhapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapuss!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "delete.php?id=" + id;
                }
            });
        }

        function confirmLogout() {
            Swal.fire({
                title: 'Logout',
                text: 'Are you sure you want to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        }
    </script>

</body>
</html>
