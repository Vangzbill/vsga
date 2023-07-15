<?php
$conn = mysqli_connect("localhost", "root", "", "dts_produk");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$namaMerk = $_POST['nama_merk'];
$warna = $_POST['warna'];
$jumlah = $_POST['jumlah'];

$query = "INSERT INTO printer (nama_merk, warna, jumlah) VALUES ('$namaMerk', '$warna', '$jumlah')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>";
    echo "swal({
            title: 'Sukses',
            text: 'Data printer berhasil disimpan!',
            icon: 'success',
            button: 'OK'
        }).then(function() {
            window.location.href = 'index.php';
        });";
    echo "</script>";
} else {
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>";
    echo "swal({
            title: 'Error',
            text: 'Terjadi kesalahan saat menyimpan data printer!',
            icon: 'error',
            button: 'OK'
        }).then(function() {
            window.location.href = 'index.php';
        });";
    echo "</script>";
}

mysqli_close($conn);
?>
