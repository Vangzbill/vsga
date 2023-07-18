<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <style>
        body {
            background-image : url('skul.png');
            background-repeat : repeat;
            background-size : 200px;
            font-family: Arial, sans-serif;
        }
        .data-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
        }
        h1 {
            color: #007bff;
        }
        table {
            width: 100%;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
        }
        .action-buttons a {
            margin: 5px;
            padding: 5px 10px;
            text-decoration: none;
        }
        .edit-button {
            background-color: #28a745;
            color: #fff;
        }
        .delete-button {
            background-color: #dc3545;
            color: #fff;
        }
        .back-button {
            text-align: right;
            margin-bottom: 20px;
        }
        .add-button {
            text-align: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="data-container">
        <div class="back-button">
            <a href="landing_page.html" class="btn btn-secondary">Kembali</a>
        </div>
        <h1>Daftar Siswa</h1>
        <div class="add-button">
            <a href="tambah_data_siswa.php" class="btn btn-primary">Tambah Data</a>
        </div>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Action</th>
            </tr>
            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db   = 'dts_siswa';
            $conn = mysqli_connect($host, $user, $pass, $db);

            if (mysqli_connect_errno()) {
                die("Gagal terhubung ke database: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM siswa";
            $result = mysqli_query($conn, $query);

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['alamat']}</td>";
                echo "<td>{$row['tgl_lahir']}</td>";
                echo "<td>{$row['jk']}</td>";
                echo "<td>{$row['agama']}</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='edit_siswa.php?id={$row['id']}' class='edit-button'>Edit</a>";
                echo "<a href='#' class='delete-button' onclick='handleDelete({$row['id']})'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function deleteConfirmation() {
        return new Promise((resolve) => {
            swal({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                buttons: ['Batal', 'Hapus'],
                dangerMode: true,
            }).then((willDelete) => {
                resolve(willDelete); 
            });
        });
    }

    function proceedDelete(id) {
        if (id) {
            window.location.href = 'hapus_siswa.php?id=' + id;
        } else {
            window.location.href = 'lihat_daftar_siswa.php';
        }
    }

    async function handleDelete(id) {
        const willDelete = await deleteConfirmation(); 
        if (willDelete) {
            proceedDelete(id);
        } else {
            proceedDelete(null); 
        }
    }
</script>


</body>
</html>
