<?php
// db.php includes the database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);

    // Validate required fields
    if (empty($name) || empty($age) || empty($gender) || empty($contact_number)) {
        echo "All fields are required!";
        exit();
    }

    // SQL query to insert the patient details into the database
    $sql = "INSERT INTO patients (name, age, gender, contact_number) 
            VALUES ('$name', '$age', '$gender', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        $patient_id = $conn->insert_id;
        echo "<script type='text/javascript'>alert('New patient record created successfully! Your patient ID is: " . $patient_id . "');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
    // Close the database connection
    $conn->close();
}
?>
