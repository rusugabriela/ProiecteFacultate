<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
session_start();
$conn = new mysqli("localhost", "root", "", "problema7");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_SESSION['id'])){
    $sql = "select * from comentarii order by id desc";
    $result = $conn->query($sql);
}
else{
    $sql = "select * from comentarii  where accepted = 1  order by id desc";
    $result = $conn->query($sql);
}

require "views/index.php";
