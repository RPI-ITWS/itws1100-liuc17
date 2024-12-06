<?php
$server = "liucrpi.eastus.cloudapp.azure.com"; // Replace with your server (e.g., 127.0.0.1)
$username = "phpmyadmin"; // Replace with your phpMyAdmin username
$password = "wodePANGxiong18"; // Replace with your phpMyAdmin password
$database = "mySite"; // The database you created

// Establish a connection
$conn = new mysqli($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
