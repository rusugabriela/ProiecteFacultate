<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "problema4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['username'];
$password = $_POST['password'];


if (empty($email) || empty($password)) {
    error("Completati usernaname si parola");
    header('Location: login.php');
    exit();
}


$stmt = $conn->prepare("select * from users where email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$row = $rows[0];
if($row['active']==0){
    error("Your account isn't activated yet. Please verify you email and click on the activation link");
    header('Location: login.php');
    exit();
}
if (count($rows) < 1) {
    error("Invalid email/password");
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
$_SESSION['user'] = $email;
message("You're logged in");
header('Location: index.php');
