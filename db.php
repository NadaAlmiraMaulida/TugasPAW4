<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_eror);
}
?>
