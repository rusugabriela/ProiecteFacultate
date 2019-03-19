<?php
$target_dir =/*$_POST['var'].*/"/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"],".jpg");
$target_file2 = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo "<br>".$target_file."<br>";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file2)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$conn=new mysqli("localhost","root","","profil");
$query="insert into Imagini(URL,Username) value('".$target_file."',"."'".$target_dir."');";
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header("location:index.php"."?user=".$target_dir);
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>