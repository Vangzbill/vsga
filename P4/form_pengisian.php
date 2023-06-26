<!DOCTYPE html>
<html>
<head>
    <title>Form Pengisian Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .card-img-top {
            object-fit: cover;
            height: 495px;
        }
        .row{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://static.vecteezy.com/system/resources/previews/006/431/841/original/person-holding-server-flat-icon-of-data-administrator-vector.jpg" class="card-img-top" alt="Gambar Siswa">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Form Pengisian Data</h2>
                        <form method="POST" action="save.php">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        <?php if(isset($_GET['status'])) {
            $status = $_GET['status'];
            if($status == 'success') { ?>
                swal("Sukses", "Data berhasil disimpan.", "success");
            <?php } else if($status == 'error') { ?>
                swal("Error", "Terjadi kesalahan. Data gagal disimpan.", "error");
            <?php }
        } ?>
    </script>
</body>
</html>
