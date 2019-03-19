<?php
include 'connect.php';
$sql = "select distinct Plecare from Trenuri";
$result = $conn->query($sql);
if($result->num_rows>0){
	echo "<select id='plecare' name='sosire'>";
	while($row=$result->fetch_assoc()){
		echo "<option>".$row["Plecare"]."</option>";
	}
	echo "</select>";
}

?>