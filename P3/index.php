<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 1 Pogalan - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
        }
        .wrapper {
            min-height: 90%;
            margin-bottom: -50px;
        }
        .footer {
            background-color: yellow;
            color: black;
            height: 50px; 
            padding: 15px;
        }
        .carousel-img {
            max-height: 450px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="IMG-20200813-WA0400-removebg-preview (5).png" alt="Logo" width="40" height="40" class="mr-2">
        <a class="navbar-brand" href="#">SMPN 1 Pogalan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                        <a href="#" class="list-group-item list-group-item-action">Siswa</a>
                        <a href="#" class="list-group-item list-group-item-action">Guru</a>
                        <a href="#" class="list-group-item list-group-item-action">Mata Pelajaran</a>
                        <a href="#" class="list-group-item list-group-item-action">Ruang Kelas</a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h2>Selamat Datang di Dashboard SMPN 1 Pogalan</h2>
                    <div id="carouselSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEhK00rsJuBHHP7_-SSroOsVtVI5HmH2HTRcFHK-bt1jdy26C3KYFQuGu-FEm--f-FzVGFQtyimN0JGW5NRZB1_h3meq8oaKC7oJ9rdRO60WTTnj0ultG261DbUm1cVh1fqSeh5zt4bRfgvWa1qkw6B8ErOvkkPQfOwL8JRassD090hI8VErJbXaIZoQiQ=w640-h426" class="d-block w-100 carousel-img" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://tni.mil.id/mod/news/images/normal/428b26e2ea19aaf3c55fc8d3a61941aa.jpg" class="d-block w-100 carousel-img" alt="Slide 2">
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis asperiores rem doloribus ipsa explicabo repudiandae distinctio magnam! Fuga, itaque ad! Commodi, provident accusamus, unde quaerat repellendus ipsa excepturi similique quas!</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2023 Vangzbill. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>