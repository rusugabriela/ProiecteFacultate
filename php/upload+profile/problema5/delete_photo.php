<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "problema5");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id =$_GET['id'];
$user = $_SESSION['id'];
$stmt = $conn->prepare("select * from imagini where id=? and id_user= ?  ");
$stmt->bind_param("ii", $id,$user);
$stmt->execute();
$rows =$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$row = $rows[0];
unlink( "images/".$row['url']);

$stmt1 = $conn->prepare("delete from imagini where id=?  and id_user= ?");
$stmt1->bind_param("ii", $id,$user);


if ($stmt1->execute() === TRUE) {
//    message("Your photo was deleted with succes");

} else {
    error("There was an error. Try again");
    header('Location: see_photos.php');
    exit();
}

header('Location: see_photos.php');
