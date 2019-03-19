<?php
include 'connect.php';

$sql = "select distinct Sosire from Trenuri";
$result = $conn->query($sql);
if($result->num_rows>0){
	echo "<select id='sosire' name='Sosire'>";
	while($row=$result->fetch_assoc()){
		echo "<option>".$row["Sosire"]."</option>";
	}
	echo "</select>";
}

?>