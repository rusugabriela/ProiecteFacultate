<?php
require_once "utils.php";
$conn = new mysqli("localhost", "root", "", "practic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_SESSION['id'];
$nume = $_POST['namecontact'];
$prenume = $_POST['prenume'];
$telefon = $_POST['telefon'];
$adresa=$_POST['adresa'];
$email=$_POST['email'];
$data=$_POST['data'];
if(empty($nume) || empty($prenume) || empty($telefon) || empty($adresa)||empty($email)||empty($data)){
    header('Location: insert_contacts.php');
    exit();
}
$sql = "insert into agenda(id, nume, prenume,telefon,adresa,email,fotografie,data,iduser)VALUES(DEFAULT,'$nume','$prenume','$telefon','$adresa','$email',' ','$data','$id')";
            if($conn->query($sql) == TRUE){
                //echo "<div class='alert alert-success'>
                //<strong>Succes!</strong> contact adaugat cu succes!
                //</div>";
				message("contact adaugat cu succes");
            }
            else
            {
                //echo "<div class='alert alert-danger'>
                //<strong>Danger!</strong> contactul nu a fost adaugat!
                //</div>";
				error("A aparut o eroare la adaugarea contactului!");
            }

header('Location: insert_contacts.php');