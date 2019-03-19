<?php
$file =$_POST['poza'].".jpg";
if(!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
$conn=new mysqli("localhost","root","","profil");
$query="delete from  Imagini where URL='".$_POST['poza']."';";
if ($conn->query($query) === TRUE) {
    echo "Deleted successfully";
    header("location:index.php"."?user=".$_POST["Username"]);
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>