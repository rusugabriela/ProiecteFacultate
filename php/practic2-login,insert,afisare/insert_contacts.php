<?php
require_once "utils.php";
if(!isset($_SESSION['id'])){
    error("Nu aveti permisiunea de a accesa aceasta pagina");
    header('Location: index.php');
    exit();

}
$conn = new mysqli("localhost", "root", "", "practic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$contacts = $conn->query("select * from agenda");
require "add_contacts.php";