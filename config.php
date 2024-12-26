<?php
// config.php
$servername = "localhost"; // Typically 'localhost' on Hostinger
$db_username = "u938149287_hornehx_db"; // Replace with your actual DB username
$db_password = "Christug@1320"; // Replace with your actual DB password
$dbname = "u938149287_hornehx_db";    // Replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
