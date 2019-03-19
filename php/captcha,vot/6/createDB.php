<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE concursPoze";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$dbname = "concursPoze";
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// sql to create table
$sql = "CREATE TABLE Poze (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Titlu VARCHAR(30) NOT NULL,
Imagine VARCHAR(30) NOT NULL,
Voturi int default 0
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Poze created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



$conn->close();
?>