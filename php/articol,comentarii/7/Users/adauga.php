<?php

include 'connect.php';

$id = $_POST["com"];
$sql = "select * from deverificat where id=".$id;

$result = $conn->query($sql);

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$sql = "insert into Comentarii (Nume,Comentariu) VALUES ('".$row["name"]."','".$row["comm"]."')";
		if ($conn->query($sql) === TRUE) {
		    echo "Comentariu adaugat ";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$sql = "delete from deverificat where id=".$row["id"];
		if ($conn->query($sql) === TRUE) {
		    echo "Comentariu adaugat ";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
}
?>