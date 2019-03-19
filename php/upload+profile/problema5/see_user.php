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
$id =$_SESSION['id'];
$result =$conn->query("select * from users where id<>'$id'");

require "views/see_users.php";