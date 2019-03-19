<?php
//conexiune la baza de date
$conn = new mysqli("localhost", "root", "", "practic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$query = "select * from user";
$result = $conn->query($query);

require "index2.php";