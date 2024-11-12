<?php
require '../config/database.php';

function getPatients() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM patients");
    $stmt->execute();
    return $stmt->fetchAll();
}

function addPatient($data) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO patients (first_name, last_name, gender, date_of_birth, contact_number, address, email, emergency_contact, blood_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $data['first_name'],
        $data['last_name'],
        $data['gender'],
        $data['date_of_birth'],
        $data['contact_number'],
        $data['address'],
        $data['email'],
        $data['emergency_contact'],
        $data['blood_type']
    ]);
}
?>
