<?php
$servername = "localhost";
$username = "root";
$password = "Anshu@2024";
$dbname = "healthcare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
