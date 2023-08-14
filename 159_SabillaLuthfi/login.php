<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Process</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "159_sabillaluthfi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        $authenticated = false;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["username"] == $username && $row["password"] == $password) {
                    $authenticated = true;
                    break;
                }
            }
        }

        if ($authenticated) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("Location: admin.php");
            exit;
        } else {
            echo '<script>
                Swal.fire({
                    title: "Error",
                    text: "Login failed!",
                    icon: "error",
                    allowOutsideClick: false,
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "index.php";
                });
            </script>';
        }
    }

    $conn->close();
    ?>
</body>
</html>
