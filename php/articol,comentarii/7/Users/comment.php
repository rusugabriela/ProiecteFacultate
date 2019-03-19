<?php
  
$name = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $comment = test_input($_POST["comment"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include 'connect.php';

$sql = "insert into deVerificat (name,comm) VALUES ('".$name."','".$comment."')";

if ($conn->query($sql) === TRUE) {
    echo "Your comment will be post after it will be validate by an administrator. ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>