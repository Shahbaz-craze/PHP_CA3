<?php
// Include database connection
include 'db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve vital signs from the form
    $heart_rate = $_POST['heart_rate'] ?? '';
    $blood_pressure = $_POST['blood_pressure'] ?? '';
    $temperature = $_POST['temperature'] ?? '';
    $patient_id = $_POST['patient_id'] ?? '';

    // Default message variable
    $alert_message = '';

    // Check for critical conditions (example thresholds)
    if ($heart_rate > 100) {
        $alert_message .= "Critical: High heart rate detected ($heart_rate bpm). ";
    }

    if ($temperature > 38.0) {
        $alert_message .= "Critical: High body temperature detected ($temperature °C). ";
    }

    // Blood pressure (assuming normal range is 90/60 to 120/80)
    if (strpos($blood_pressure, '/') !== false) {
        list($systolic, $diastolic) = explode('/', $blood_pressure);
        if ($systolic > 140 || $diastolic > 90) {
            $alert_message .= "Critical: High blood pressure detected ($blood_pressure). ";
        }
    } else {
        echo "Error: Invalid blood pressure format.";
        exit();
    }

    // If any alert conditions were triggered, send an alert
    if ($alert_message != '') {
        // Check if patient_id exists in the patients table
        $sql_check_patient = "SELECT patient_id FROM patients WHERE patient_id = ?";
        $stmt_check_patient = $conn->prepare($sql_check_patient);
        $stmt_check_patient->bind_param('i', $patient_id);
        $stmt_check_patient->execute();
        $result = $stmt_check_patient->get_result();

        
if ($result->num_rows > 0) {
    // Patient exists, proceed with inserting the alert
    $sql = "INSERT INTO alerts (patient_id, alert_message) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('is', $patient_id, $alert_message);
        $stmt->execute();

        // Success message in JavaScript
        echo "<script type='text/javascript'>
                alert('Alert sent to healthcare provider. The following alert message has been logged:\\n\\n" . $alert_message . "');
            </script>";
    } else {
        // Error message in JavaScript
        echo "<script type='text/javascript'>
                alert('Error: " . $sql . " - " . $conn->error . "');
            </script>";
    }
} else {
    // Patient does not exist
    echo "<script type='text/javascript'>
            alert('Error: Patient ID does not exist.');
        </script>";
}
} else {
    // No critical conditions detected
    echo "<script type='text/javascript'>
            alert('No critical conditions detected.');
        </script>";
}



    // Close the database connection
    $conn->close();
}
?>
