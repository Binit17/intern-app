<?php
session_start();

// Include the database configuration file
require_once 'config.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Process the form submission to add a new internship
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && isset($_POST['company_name']) && isset($_POST['description']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['duration']) && isset($_POST['salary']) && isset($_POST['location'])) {
        $title = $_POST['title'];
        $company_name = $_POST['company_name'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $duration = $_POST['duration'];
        $salary = $_POST['salary'];
        $location = $_POST['location'];
        $status = 'open';

        // Insert the new internship into the database
        $insertSql = "INSERT INTO internships (admin_id, title, company_name, description, start_date, end_date, duration, salary, location, status)
                      VALUES ('{$_SESSION['user_id']}', '$title', '$company_name', '$description', '$start_date', '$end_date', '$duration', '$salary', '$location', '$status')";

        if (mysqli_query($conn, $insertSql)) {
            $message = "New internship added successfully.";
        } else {
            $error = "Error adding the internship: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Internship</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #00cc66;
            color: #fff;
            padding: 10px;
            margin: 0;
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #00cc66;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #00994d;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #00cc66;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Add New Internship</h2>
    <form method="POST" action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>
        <br>
        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required>
        <br>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required>
        <br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <br>
        <button type="submit">Add Internship</button>
    </form>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
