<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12727549";
$password = "2AbnLRGCUw";
$database = "sql12727549";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
