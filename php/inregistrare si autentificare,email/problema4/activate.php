<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$token = $_GET['token'];


$conn = new mysqli("localhost", "root", "", "problema4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("select * from users where token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if (count($rows) < 1) {
    error("This is not a valid link");
    header('Location: index.php');
    exit();
} else {
    $stmt2 = $conn->prepare("update users set active=1 where token=?");
    $stmt2->bind_param("s", $token);
    $stmt2->execute();

    if ($stmt2->execute() === TRUE) {

        message("Account activated. You can log in now");
        header('Location: login.php');

    } else {
        error("There was an error :(");
    }

}
