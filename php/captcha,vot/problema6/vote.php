<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$i = $_POST['idv'];
if( $_POST["captcha"] == $_SESSION["code"]){

    $conn = new mysqli("localhost", "root", "", "problema6");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "update poze set voturi=voturi+1 where id=$i";

    if ($conn->query($sql) === TRUE) {
        message("Votul tau a fost inregistrat cu succes");
    } else {
       error("Error updating record: ");
    }

}
else{
    error("Cod incorect");
    header('Location: vote_captcha.php?id='.$i);
    exit();
}


header('Location: index.php');