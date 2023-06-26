<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dts_simplebio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO biodata (nama, tanggal_lahir, jenis_kelamin, alamat) VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$alamat')";

if ($conn->query($sql) === TRUE) {
    header("Location: form_pengisian.php?status=success");
    exit();
} else {
    header("Location: form_pengisian.php?status=error");
    exit();
}

$conn->close();
?>
