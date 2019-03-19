<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
$conn = new mysqli("localhost", "root", "", "problema3");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "select s.nume as numeS,n.nota as nota,m.nume as numeM from studenti as s join note as n on s.id=n.id_student join materii m on n.id_materie=m.id order by n.id desc ";
$result = $conn->query($query);

require "views/index.php";
