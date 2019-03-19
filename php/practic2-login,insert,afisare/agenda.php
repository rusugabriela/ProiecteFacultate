<?php
session_start();
$conn = new mysqli("localhost", "root", "", "practic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_SESSION['id'];

$query = "select * from agenda where iduser='$id' ";
$result = $conn->query($query);

require "agenda2.php";