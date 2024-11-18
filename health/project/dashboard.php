<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
include 'db.php';

// Check if the doctor is logged in
if (!isset($_SESSION['doctor_id'])) {
    header("Location: login.html");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

// Fetch alerts
$sql = "SELECT alerts.*, patients.name AS patient_name 
        FROM alerts 
        JOIN patients ON alerts.patient_id = patients.patient_id 
        WHERE alerts.status = 'Pending'";

$result = $conn->query($sql);

echo "<h2>Pending Alerts</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<p><strong>Patient: </strong>" . $row['patient_name'] . "</p>";
    echo "<p><strong>Alert: </strong>" . $row['alert_message'] . "</p>";
    echo "<p><strong>Time: </strong>" . $row['alert_time'] . "</p>";
    echo "</div><hr>";
}

$conn->close();
?>
</body>
</html>

