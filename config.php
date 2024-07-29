<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to escape special characters in a string for use in an SQL statement
function escapeString($conn, $string) {
    return mysqli_real_escape_string($conn, $string);
}
?>
