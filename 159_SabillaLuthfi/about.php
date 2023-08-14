<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About BPSDMP Kominfo Surabaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            position: fixed;
            top: 0;
            width: 100%;
            transition: top 0.3s;
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
            margin: 80px auto;
            max-width: 800px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm" id="navbar">
        <a class="navbar-logo" href="index.php"><img src="logo-BPSDMP.png" alt="Logo" width="40"></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
            </li>
        </ul>
    </nav>

    <div class="content">
        <div class="card">
            <img class="card-img-top" src="bg.jpg" alt="About Image">
            <div class="card-body">
                <h4 class="card-title">Tentang BPSDMP Kominfo Surabaya</h4>
                <p class="card-text">Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika (BPSDMP Kominfo) adalah lembaga yang berfokus pada pengembangan sumber daya manusia dan penelitian di bidang komunikasi dan informatika.</p>
                <p class="card-text">Kami berkomitmen untuk meningkatkan kompetensi dan pengetahuan dalam industri komunikasi dan informatika. Melalui berbagai program pelatihan, workshop, dan kegiatan penelitian, kami bertujuan untuk mendukung pertumbuhan dan perkembangan para profesional di bidang ini.</p>
                <p class="card-text">Dengan dukungan tim ahli dan fasilitas yang modern, BPSDMP Kominfo Surabaya siap menjadi mitra dalam memajukan industri komunikasi dan informatika di wilayah ini.</p>
            </div>
        </div>
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
