<?php
$conn = mysqli_connect("localhost", "root", "", "dts_siswa");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$id_siswa = $_POST['id_siswa'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];

$query = "UPDATE siswa SET nama = '$nama', alamat = '$alamat', tgl_lahir = '$tgl_lahir', jk = '$jenis_kelamin', agama = '$agama' WHERE id = $id_siswa";
$result = mysqli_query($conn, $query);

if ($result) {
    mysqli_close($conn);
    header("Location: edit_siswa.php?id=$id_siswa&status=success");
    exit();
} else {
    mysqli_close($conn);
    header("Location: edit_siswa.php?id=$id_siswa&status=error");
    exit();
}
?>
