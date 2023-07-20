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
        header("Location: lihat_daftar_siswa.php?delete_success=true");
        exit();
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat menghapus data siswa!');
            window.location.href = 'lihat_daftar_siswa.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID siswa tidak diberikan!');
        window.location.href = 'lihat_daftar_siswa.php';
    </script>";
}

mysqli_close($conn);
?>
