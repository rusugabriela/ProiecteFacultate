<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
$conn = new mysqli("localhost", "root", "", "problema5");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//$result = $conn->query("select * from ceva");

require "views/index.php";