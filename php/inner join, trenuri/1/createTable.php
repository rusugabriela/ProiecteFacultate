<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trenuri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Trenuri (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Plecare VARCHAR(30) NOT NULL,
Sosire VARCHAR(30) NOT NULL,
OraPlecare TIME,
OraSosire TIME
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Trenuri created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>