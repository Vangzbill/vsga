<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <style>
        body {
            background-image : url('skul.png');
            background-repeat : repeat;
            background-size : 200px;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
        }
        h1 {
            color: #007bff;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .submit-button {
            text-align: center;
            margin-top: 20px;
        }
        .submit-button button {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        .submit-button button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "dts_siswa");

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    $id_siswa = $_GET['id'];
    $query = "SELECT * FROM siswa WHERE id = $id_siswa";
    $result = mysqli_query($conn, $query);
    $siswa = mysqli_fetch_assoc($result);
    ?>

    <div class="form-container">
        <h1>Edit Data Siswa</h1>
        <form method="post" action="proses_edit_siswa.php">
            <input type="hidden" name="id_siswa" value="<?php echo $siswa['id']; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $siswa['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required><?php echo $siswa['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="<?php echo $siswa['tgl_lahir']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label><br>
                <input type="radio" id="jk_l" name="jenis_kelamin" value="Laki-laki" <?php if ($siswa['jk'] == 'Laki-laki') echo 'checked'; ?> required>
                <label for="jk_l">Laki-laki</label><br>
                <input type="radio" id="jk_p" name="jenis_kelamin" value="Perempuan" <?php if ($siswa['jk'] == 'Perempuan') echo 'checked'; ?> required>
                <label for="jk_p">Perempuan</label>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <select id="agama" name="agama" class="form-control" required>
                    <option value="Islam" <?php if ($siswa['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                    <option value="Kristen" <?php if ($siswa['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                    <option value="Katolik" <?php if ($siswa['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                    <option value="Hindu" <?php if ($siswa['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                    <option value="Buddha" <?php if ($siswa['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
                    <option value="Konghucu" <?php if ($siswa['agama'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                </select>
            </div>
            <div class="submit-button">
                <button type="submit">Simpan Perubahan</button>
            </div>
        </form>

        <div class="back-button">
            <a href="landing_page.html" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
                echo "swal({
                    title: 'Sukses',
                    text: 'Data siswa berhasil diupdate!',
                    icon: 'success',
                    button: 'OK'
                }).then(function() {
                    window.location.href = 'lihat_daftar_siswa.php';
                });";
            } elseif ($_GET['status'] === 'error') {
                echo "swal({
                    title: 'Error',
                    text: 'Terjadi kesalahan saat mengupdate data siswa!',
                    icon: 'error',
                    button: 'OK'
                }).then(function() {
                    window.location.href = 'edit_data_siswa.php?id=$id_siswa';
                });";
            }
        }
        ?>
    </script>
</body>
</html>
