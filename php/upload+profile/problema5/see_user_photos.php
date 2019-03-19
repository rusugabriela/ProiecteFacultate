<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */


$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "problema5");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$stmt = $conn->prepare("select * from imagini where id_user=? order by id desc");
$stmt->bind_param("i", $id);
$stmt->execute();
$images =$stmt->get_result()->fetch_all(MYSQLI_ASSOC);

$stmt = $conn->prepare("select username from users where id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$user = $rows[0];

require "views/see_user_photos.php";