<?php
// Start output buffering to capture any unintended output
ob_start();

// Start the session
session_start();

// Include the database configuration file
require_once 'config.php';

// Check if the user is logged in as a student or admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    // Clear the output buffer and then redirect
    ob_end_clean();
    header("Location: login.php");
    exit();
}

// Redirect to the appropriate dashboard based on the user role
if ($_SESSION['role'] === 'student') {
    // Clear the output buffer and then redirect
    ob_end_clean();
    header("Location: student_dashboard.php");
    exit();
} elseif ($_SESSION['role'] === 'admin') {
    // Clear the output buffer and then redirect
    ob_end_clean();
    header("Location: admin_dashboard.php");
    exit();
}

// Clear the output buffer before any HTML content
ob_end_clean();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard</h2>
    <ul>
        <li><a href="internships.php">Internship List</a></li>
        <!-- Add more links for other dashboard functionalities -->
        <!-- Example: <li><a href="profile.php">Profile</a></li> -->
    </ul>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>