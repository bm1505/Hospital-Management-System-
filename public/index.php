<?php
session_start();

// Check if the user is logged in; if not, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require '../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <main>
        <h1>Welcome to the Hospital Management System</h1>
        <section class="card-container">
            <a href="../patients.php" class="card">Manage Patients</a>
            <a href="../doctors.php" class="card">Manage Doctors</a>
            <a href="../appointments.php" class="card">Manage Appointments</a>
            <a href="../departments.php" class="card">Manage Departments</a>
            <!-- More links as needed -->
        </section>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>

<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f0f2f5;
    color: #333;
}

header {
    background-color: #00695c;
    color: #fff;
    padding: 1rem;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

header h2 {
    margin: 0;
}

nav a {
    color: #fff;
    margin: 0 10px;
    text-decoration: none;
    font-weight: bold;
}

nav a:hover {
    text-decoration: underline;
}

main {
    padding: 20px;
    max-width: 1000px;
    margin: 0 auto;
}

h1 {
    text-align: center;
    color: #00695c;
    margin-bottom: 20px;
}

.card-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    width: 220px;
    text-decoration: none;
    color: #333;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    font-weight: bold;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    color: #00695c;
}

footer {
    background-color: #00695c;
    color: #fff;
    padding: 10px;
    text-align: center;
    box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
    width: 100%;
}

</style>