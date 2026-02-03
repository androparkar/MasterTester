<?php
// Database configuration
$servername = "sql107.infinityfree.com"; // Database server name
$username = "if0_38438621";         // Database username
$password = "oJRPtjQiQZwom";             // Database password
$dbname = "if0_38438621_master_tester";  // Database name
$port = "3306";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
global $conn;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully";
}