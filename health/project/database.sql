CREATE DATABASE healthcare;
use healthcare;
-- Table to store patient information
CREATE TABLE patients (
    patient_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    contact_number VARCHAR(15) NOT NULL
);

-- Table to store vital signs
CREATE TABLE vital_signs (
    vital_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    heart_rate INT NOT NULL,
    blood_pressure VARCHAR(20) NOT NULL,
    temperature FLOAT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id)
);


-- Table to store alerts
CREATE TABLE alerts (
    alert_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    alert_message TEXT NOT NULL,
    alert_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Resolved') DEFAULT 'Pending',
    FOREIGN KEY (patient_id) REFERENCES patients(patient_id)
);

CREATE TABLE doctors (
    doctor_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);