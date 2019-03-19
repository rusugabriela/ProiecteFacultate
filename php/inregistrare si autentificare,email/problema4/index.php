<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
$conn = new mysqli("localhost", "root", "", "problema4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$query = "select * from users";
$result = $conn->query($query);

require "views/index.php";