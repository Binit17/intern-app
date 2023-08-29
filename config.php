<?php
// <!-- this file includes the necessary configuration settings for our app,
// such as database credentials and other global variables. It is usually
// included at the beginning of the other PHP files. -->
//database configuration
$servername = "db";
// $servername = "intern-db";
$username = "gautam";
$password = "gautam";
// $rootpassword = "gautam";
$database = "intern_app";

//create database connection
/* Changes around here */
$conn = mysqli_connect($servername, $username, $password, $database );

//check connection
if(!$conn) 
{
    die("Connection failed ". mysqli_connect_error());
}
// else
// {
//     echo "Connected to MySQL server successfully!";
// }
/* Changes around here */

// Create database connection
// $conn = mysqli_connect('127.0.0.1', 'gautam', 'gautam', 'intern_app', 3306);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }


//if there are any other global variables or configurations , define here.
global $student_id;
?>