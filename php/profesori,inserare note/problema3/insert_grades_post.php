<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "problema3");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student = $_POST['student'];
$materie = $_POST['materie'];
$nota = $_POST['nota'];
if(empty($student) || empty($materie) || empty($nota)){
    header('Location: insert_grades.php');
    exit();
}

$stmt= $conn->prepare("insert into note(id_student, id_materie, nota)VALUES (?,?,?)");
$stmt->bind_param("iii", $student,$materie,$nota);


if ($stmt->execute() === TRUE) {

    message("Nota adaugata cu succes");

} else {
    error("A aparut o eroare la adaugarea notei. Incearca din nou");
}

header('Location: insert_grades.php');