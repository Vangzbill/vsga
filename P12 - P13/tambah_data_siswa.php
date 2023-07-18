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
    <div class="form-container">
        <h1>Tambah Data Siswa</h1>
        <form method="post" action="proses_tambah_siswa.php">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label><br>
                <input type="radio" id="jk_l" name="jenis_kelamin" value="Laki-laki" required>
                <label for="jk_l">Laki-laki</label><br>
                <input type="radio" id="jk_p" name="jenis_kelamin" value="Perempuan" required>
                <label for="jk_p">Perempuan</label>
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <select id="agama" name="agama" class="form-control" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="submit-button">
                <button type="submit">Simpan Data</button>
            </div>
        </form>

        <div class="back-button">
            <a href="landing_page.html" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php
        if (isset($_GET['success'])) {
            echo "swal({
                title: 'Sukses',
                text: 'Data siswa berhasil ditambahkan!',
                icon: 'success',
                button: 'OK'
            }).then(function() {
                window.location.href = 'lihat_daftar_siswa.php';
            });";
        } elseif (isset($_GET['error'])) {
            echo "swal({
                title: 'Error',
                text: 'Terjadi kesalahan saat menyimpan data siswa!',
                icon: 'error',
                button: 'OK'
            }).then(function() {
                window.location.href = 'tambah_data_siswa.php';
            });";
        }
        ?>
    </script>
</body>
</html>
