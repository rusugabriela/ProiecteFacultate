<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */

$conn = new mysqli("localhost", "root", "", "problema6");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$query = "select * from poze order by voturi desc";
$images = $conn->query($query);

require "views/index.php";
