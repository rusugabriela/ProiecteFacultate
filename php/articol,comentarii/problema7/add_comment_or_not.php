<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
$conn = new mysqli("localhost", "root", "", "problema7");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_POST['id_com'];
if(isset($_POST['accept'])){
$conn->query("update comentarii set accepted=1 where id='$id'");

}elseif(isset($_POST['decline'])){
    $conn->query("delete from comentarii where id='$id'");

}
header('Location: index.php');
