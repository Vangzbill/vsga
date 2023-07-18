<?php
$conn = mysqli_connect("localhost", "root", "", "dts_siswa");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];

$query = "INSERT INTO siswa (nama, alamat, tgl_lahir, jk, agama) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sssss", $nama, $alamat, $tgl_lahir, $jenis_kelamin, $agama);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: tambah_data_siswa.php?success");
    exit();
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: tambah_data_siswa.php?error");
    exit();
}
?>
