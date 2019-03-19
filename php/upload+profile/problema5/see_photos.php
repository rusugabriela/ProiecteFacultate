<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */

session_start();
$conn = new mysqli("localhost", "root", "", "problema5");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['id'];

$query = "select * from imagini where id_user =$id order by id desc ";
$images = $conn->query($query);
require "views/my_photos.php";