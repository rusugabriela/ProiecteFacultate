<?php
/**
 *
 * Created by PhpStorm.
 * User: Alina
 */

$conn = new mysqli("localhost", "root", "", "problema1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$plecari = $conn->query("select  distinct localitate_plecare from trenuri")->fetch_all(MYSQLI_ASSOC);
$sosiri = $conn->query("select  distinct localitate_sosire from trenuri")->fetch_all(MYSQLI_ASSOC);



require "views/select_cities.php";




