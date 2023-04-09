CREATE DATABASE `soft`;

USE `soft`;

CREATE TABLE `user`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(60),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(20),
    phone VARCHAR(11) UNIQUE,
    national_number VARCHAR(20) UNIQUE,
    birth_date DATE,
    department ENUM('Cardiology','Dental','Neurology','Surgery',),
    user_type ENUM('Patient','Doctor') DEFAULT 'Patient'
);

CREATE TABLE `appointment`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME,
    text TEXT,
    doctor_id INT,
    patient_id INT,
    FOREIGN KEY(doctor_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY(patient_id) REFERENCES user(id) ON DELETE CASCADE
)