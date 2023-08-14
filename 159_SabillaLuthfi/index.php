<?php
session_start();

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
    <title>Kegiatan BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .landing-page {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to bottom, white, #33BBC5);
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; 
        }

        .navbar a {
            color: white;
        }

        .navbar-logo {
            margin-right: 10px;
        }

        .content {
            padding: 50px;
            margin-top: 80px;
        }

        .content-with-navbar {
            margin-top: 120px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm" id="navbar">
        <a class="navbar-logo" href="#"><img src="logo-BPSDMP.png" alt="Logo" width="40"></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
            </li>
        </ul>
    </nav>

    <div class="landing-page">
        <img src="logo-BPSDMP.png" alt="Kominfo Logo" width="200">
        <h1 style="margin-top: 20px;">Informasi Kegiatan BPSDMP Kominfo Surabaya</h1>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#33BBC5" fill-opacity="1" d="M0,160L30,160C60,160,120,160,180,138.7C240,117,300,75,360,48C420,21,480,11,540,53.3C600,96,660,192,720,208C780,224,840,160,900,149.3C960,139,1020,181,1080,192C1140,203,1200,181,1260,149.3C1320,117,1380,75,1410,53.3L1440,32L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>

    <div id="home" class="content">
        <h1 style="text-align: center;">Kegiatan BPSDMP Kominfo Surabaya</h1>
        <?php if (empty($kegiatan)) : ?>
            <p>Tidak ada data kegiatan saat ini.</p>
        <?php else : ?>
            <div class="row">
                <?php foreach ($kegiatan as $kegiatan) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="uploads/<?php echo $kegiatan["gambar"]; ?>" class="card-img-top" alt="Kegiatan Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $kegiatan["nama"]; ?></h5>
                                <p class="card-text"><?php echo $kegiatan["deskripsi"]; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; Sabilla Luthfi Rahmadhan 2023. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>