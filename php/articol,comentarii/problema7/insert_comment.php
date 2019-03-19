<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "problema7");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nume = $_POST['name'];
$mesaj = $_POST['comment'];

$stmt = $conn->prepare("insert into comentarii (nume_user,mesaj) values (?,?)");
$stmt->bind_param("ss", $nume, $mesaj);


if ($stmt->execute() === TRUE) {
    message("Comentariuil tau a fost adaugat. Urmeaza sa fie validat de catre un moderator");

} else {
    error("A aparut o eroare la trimiterea comentariului");
}

header('Location: index.php');