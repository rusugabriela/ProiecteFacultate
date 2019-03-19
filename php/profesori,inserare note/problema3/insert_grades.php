<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
session_start();
if(!isset($_SESSION['id'])){
    error("Nu aveti perminsiunea de a accesa aceasta pagina");
    header('Location: index.php');
    exit();

}
$conn = new mysqli("localhost", "root", "", "problema3");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$studenti = $conn->query("select id,nume from studenti");
$materii = $conn->query("select id,nume from materii");

require "views/add_grades.php";
