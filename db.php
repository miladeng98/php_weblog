<?php
$db_servername = "localhost"; // Your server name or IP address
$db_username = "root"; // Your MySQL username
$db_password = ""; // Your MySQL password
$db_name = "voorivex"; // Your database name

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// Close the connection
// $conn->close();
?>

