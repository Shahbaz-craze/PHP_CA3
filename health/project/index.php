<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Monitoring System</title>
    <!-- Bootstrap 4 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="my-5 text-center">
            <h1 class="display-4">Healthcare Monitoring System</h1>
            <p class="lead">Track vital signs, health conditions, and receive alerts</p>
        </header>

        <!-- Dashboard Section -->
        <div class="row">
            <!-- Patient Info Form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Patient Information</h4>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="insert_patient.php">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit Patient Info</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Vital Signs Form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h4>Vital Signs (currently)</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="insert_vital_signs.php">
                            <div class="form-group">
                                <label for="patient_id">Patient ID</label>
                                <input type="number" class="form-control" id="patient_id" name="patient_id" required>
                            </div>
                            <div class="form-group">
                                <label for="heart_rate">Heart Rate</label>
                                <input type="number" class="form-control" id="heart_rate" name="heart_rate" required>
                            </div>
                            <div class="form-group">
                                <label for="blood_pressure">Blood Pressure</label>
                                <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" required>
                            </div>
                            <div class="form-group">
                                <label for="temperature">Temperature</label>
                                <input type="number" step="0.1" class="form-control" id="temperature" name="temperature" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit Vital Signs</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Alert Section -->
            <div class="col-md-4">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h4>Send Alert (emergency)</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="send_alert.php">
                <div class="form-group">
                    <label for="patient_id">Patient ID</label>
                    <input type="number" class="form-control" id="patient_id" name="patient_id" required>
                </div>
                <div class="form-group">
                    <label for="heart_rate">Heart Rate</label>
                    <input type="number" class="form-control" id="heart_rate" name="heart_rate" required min="0">
                </div>
                <div class="form-group">
                    <label for="blood_pressure">Blood Pressure (Systolic/Diastolic)</label>
                    <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" required pattern="\d{2,3}/\d{2,3}" title="Blood pressure format: systolic/diastolic">
                </div>
                <div class="form-group">
                    <label for="temperature">Temperature (°C)</label>
                    <input type="number" step="0.1" class="form-control" id="temperature" name="temperature" required min="30" max="45">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Send Alert</button>
            </form>
        </div>
    </div>
</div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
