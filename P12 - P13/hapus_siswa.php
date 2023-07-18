<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Siswa</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'dts_siswa';
    $conn = mysqli_connect($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        die("Gagal terhubung ke database: " . mysqli_connect_error());
    }

    if (isset($_GET['id'])) {
        $id_siswa = $_GET['id'];
        $query = "SELECT * FROM siswa WHERE id = $id_siswa";
        $result = mysqli_query($conn, $query);
        $siswa = mysqli_fetch_assoc($result);

        if ($siswa) {
            echo "<script>
                swal({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah Anda yakin ingin menghapus data siswa?',
                    icon: 'warning',
                    buttons: {
                        cancel: 'Batal',
                        confirm: {
                            text: 'Hapus',
                            value: true,
                            className: 'delete-button-confirm'
                        }
                    }
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location.href = 'proses_hapus_siswa.php?id=$id_siswa';
                    } else {
                        window.location.href = 'lihat_daftar_siswa.php';
                    }
                });
            </script>";
        } else {
            echo "<script>
                swal({
                    title: 'Error',
                    text: 'Data siswa tidak ditemukan!',
                    icon: 'error',
                    button: 'OK'
                }).then(function() {
                    window.location.href = 'lihat_daftar_siswa.php';
                });
            </script>";
        }
    } else {
        echo "<script>
            swal({
                title: 'Error',
                text: 'ID siswa tidak diberikan!',
                icon: 'error',
                button: 'OK'
            }).then(function() {
                window.location.href = 'lihat_daftar_siswa.php';
            });
        </script>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
