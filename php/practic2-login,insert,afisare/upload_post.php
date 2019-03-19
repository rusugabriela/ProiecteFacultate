<?php

require_once "utils.php";
if (isset($_POST['submit'])) {
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'images/' . $fileNameNew;

                $conn = new mysqli("localhost", "root", "", "practic");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $id = $_SESSION['id'];
                $sql = "insert into imagini(id_user, url) values ('$id', '$fileNameNew')";

                $conn->query($sql);

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    message("You file was uploaded with success");
                } else {
                    error("There was a problem. Your file couldn't be uploaded");
                }

                header('Location: insert_contacts.php');
                exit();

            } else {
                error("Your file is too big");
            }
        } else {
            error("There was an error uploading your file");
        }
    } else {
        error("You can't upload files of this type");
    }


}