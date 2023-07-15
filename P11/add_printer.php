<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Printer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Printer</h2>
        <form method="POST" action="save_printer.php">
            <div class="form-group">
                <label for="nama_merk">Nama Merk:</label>
                <input type="text" class="form-control" id="nama_merk" name="nama_merk" required>
            </div>
            <div class="form-group">
                <label for="warna">Warna:</label>
                <input type="text" class="form-control" id="warna" name="warna" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        function showSuccessAlert() {
            swal({
                title: "Sukses",
                text: "Data printer berhasil disimpan!",
                icon: "success",
                button: "OK",
            }).then(function () {
                window.location.href = "index.php";
            });
        }

        function showErrorAlert() {
            swal({
                title: "Error",
                text: "Terjadi kesalahan saat menyimpan data printer!",
                icon: "error",
                button: "OK",
            }).then(function () {
                window.location.href = "index.php";
            });
        }

        document.querySelector("form").addEventListener("submit", function (event) {
            event.preventDefault(); 

            var form = this;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData,
            })
                .then(function (response) {
                    if (response.ok) {
                        showSuccessAlert();
                    } else {
                        showErrorAlert();
                    }
                })
                .catch(function (error) {
                    showErrorAlert();
                });
        });
    </script>
</body>
</html>
