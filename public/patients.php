<?php

require '../config/database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $emergency_contact = $_POST['emergency_contact'];
    $blood_type = $_POST['blood_type'];

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO Patients (first_name, last_name, gender, date_of_birth, contact_number, address, email, emergency_contact, blood_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $first_name, $last_name, $gender, $date_of_birth, $contact_number, $address, $email, $emergency_contact, $blood_type);

    // Execute the query
    if ($stmt->execute()) {
        echo "<p>Patient added successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            color: #4CAF50;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Add New Patient</h2>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="emergency_contact">Emergency Contact:</label>
            <input type="text" id="emergency_contact" name="emergency_contact">

            <label for="blood_type">Blood Type:</label>
            <select id="blood_type" name="blood_type" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>

            <button type="submit">Add Patient</button>
        </form>
    </div>

</body>
</html>
