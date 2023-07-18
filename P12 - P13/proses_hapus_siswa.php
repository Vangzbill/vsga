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
    $query = "DELETE FROM siswa WHERE id = $id_siswa";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            swal({
                title: 'Sukses',
                text: 'Data siswa berhasil dihapus!',
                icon: 'success',
                button: 'OK'
            }).then(function() {
                window.location.href = 'lihat_daftar_siswa.php';
            });
        </script>";
    } else {
        echo "<script>
            swal({
                title: 'Error',
                text: 'Terjadi kesalahan saat menghapus data siswa!',
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
