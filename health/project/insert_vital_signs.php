<?php
// db.php includes the database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the form inputs
    $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
    $heart_rate = mysqli_real_escape_string($conn, $_POST['heart_rate']);
    $blood_pressure = mysqli_real_escape_string($conn, $_POST['blood_pressure']);
    $temperature = mysqli_real_escape_string($conn, $_POST['temperature']);

    // Validate required fields
    if (empty($patient_id) || empty($heart_rate) || empty($blood_pressure) || empty($temperature)) {
        echo "All fields are required!";
        exit();
    }

    // Check if the patient exists in the patients table
    $check_patient_query = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
    $result = $conn->query($check_patient_query);

    if ($result->num_rows > 0) {
        // Patient exists, proceed with the insertion of vital signs
        $sql = "INSERT INTO vital_signs (patient_id, heart_rate, blood_pressure, temperature) 
                VALUES ('$patient_id', '$heart_rate', '$blood_pressure', '$temperature')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('Vital signs recorded successfully');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    } else {
        // Patient does not exist, show an error message
        echo "<script type='text/javascript'>alert('Error: Patient ID does not exist!');</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
