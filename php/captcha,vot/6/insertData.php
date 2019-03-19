<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "concursPoze";

$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "insert into Poze (Titlu,Imagine) values ('1','1.jpg');
	insert into Poze (Titlu,Imagine) values ('2','2.jpg');
	insert into Poze (Titlu,Imagine) values ('3','3.jpg');
	insert into Poze (Titlu,Imagine) values ('4','4.jpg');
	insert into Poze (Titlu,Imagine) values ('5','5.jpg');
	insert into Poze (Titlu,Imagine) values ('6','6.jpg');
	insert into Poze (Titlu,Imagine) values ('7','7.jpg');
	insert into Poze (Titlu,Imagine) values ('8','8.jpg');
	insert into Poze (Titlu,Imagine) values ('9','9.jpg');
	insert into Poze (Titlu,Imagine) values ('10','10.jpg');
	insert into Poze (Titlu,Imagine) values ('11','11.jpg');
	insert into Poze (Titlu,Imagine) values ('12','12.jpg')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>