<?php
// Start session to store login status
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = '';

// Define the default username and password
$default_username = "doctor";
$default_password = "123";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered username and password match the default values
    if ($username === $default_username && $password === $default_password) {
        // Set session variables to indicate the user is logged in
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the index page
        header("Location: index.php");
        exit;
    } else {
        // Display error if the username or password is incorrect
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hospital Management System</title>
    <link rel="stylesheet" href="../assets/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Login to Hospital Management System</h1>

        <!-- Display error message if login failed -->
        <?php if (!empty($error)) : ?>
            <p class="error"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <!-- Login form -->
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #00695c;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #00695c;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #004d40;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }

        footer {
            background-color: #00695c;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
