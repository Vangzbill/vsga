<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Logout</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    session_start();
    session_unset();
    session_destroy();

    echo '<script>
            Swal.fire({
                title: "Logged Out",
                text: "Kamu berhasil Logout.",
                icon: "success",
                allowOutsideClick: false,
                confirmButtonText: "OK"
            }).then(function() {
                window.location.href = "index.php";
            });
        </script>';
    ?>
</body>
</html>