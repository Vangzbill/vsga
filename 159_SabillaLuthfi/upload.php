<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "159_sabillaluthfi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];

    $targetDirectory = "uploads/";
    $fileName = basename($_FILES["gambar"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO kegiatan (nama, gambar, deskripsi) VALUES ('$nama', '$fileName', '$deskripsi')";
        
        if ($conn->query($sql) === TRUE) {
            $response["success"] = true;
        } else {
            $response["success"] = false;
        }
    } else {
        $response["success"] = false;
    }
}

$conn->close();

header("Content-Type: application/json");
echo json_encode($response);
?>
