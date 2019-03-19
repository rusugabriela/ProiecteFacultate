<?php
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "practic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];


if (empty($username) || empty($password)) {
    error("Completati usernaname si parola.");
    header('Location: login.php');
    exit();
}
 elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $username) || preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $password))
                {
                   error(" Câmpurile nu pot conține caractere speciale cu excepția '-._' !");
                   header('Location: login.php');
				   exit();
                }
                
 else
 {
$query="select * from user where username='$username' and parola='$password'";
$result=$conn->query($query);
 }
if($result->num_rows<=0)
	{
    error("Invalid username/password");
    header('Location: login.php');
    exit();
}
$row = $result->fetch_assoc();
$_SESSION['id'] = $row['id'];
$_SESSION['user'] = $row['username'];
message("You're logged in");
header('Location: index.php');
?>