<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "problema3");
if ($conn->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];


if (empty($username) || empty($password)) {
    error("Completati usernaname si parola");
    header('Location: login.php');
    exit();
}


$stmt = $conn->prepare("select * from profesori where username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if (count($rows) < 1) {
    error("Invalid username/password");
    header('Location: login.php');
    exit();
}
$row = $rows[0];
$hashedPwdCheck = password_verify($password, $row['parola']);
if ($hashedPwdCheck == false) {
    error("Invalid username/password");
    header('Location: login.php');
    exit();
}
$_SESSION['id'] = $row['id'];
$_SESSION['user'] = $username;
message("You're logged in");
header('Location: insert_grades.php');
