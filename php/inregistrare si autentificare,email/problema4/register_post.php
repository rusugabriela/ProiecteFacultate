<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */

require_once "utils.php";
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['confirm_password'];

if (empty($email) || empty($password) || empty($password_confirmation)) {
    error("Completati toate campurile");
    header('Location: login.php');
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    error( $email."is not a valid email address");
    header('Location: register.php');
    exit();
}
if ($password !== $password_confirmation) {
    error("Passwords don't match");
    header('Location: register.php');
    exit();
}


$conn = new mysqli("localhost", "root", "", "problema4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("select * from users where email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();
$rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
if (count($rows) > 0) {
    error("Email already used. Try again");
    header('Location: login.php');
    exit();
}

$password = password_hash($password,PASSWORD_DEFAULT);
$token = bin2hex(openssl_random_pseudo_bytes(16));

$insertStatement = $conn->prepare("insert into users(email, parola, token) values (?, ?, ?)");
$insertStatement->bind_param("sss",$email,$password, $token);


if (mail($email,'activate account','http://localhost:8004/activate.php?token='.$token, 'From: alina.pavaluc@gmail.com') && $insertStatement->execute() === TRUE) {

    message("Registered with success. Wait for a mail to activate your account, then log in");
    header('Location: login.php');
    exit();

} else {
    error("There was an error :(");
    header('Location: register.php');
    exit();
}
