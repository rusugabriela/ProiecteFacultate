<!DOCTYPE html>
<html>
<head>
	<title>Administrare comentarii</title>
</head>
<body>

<?php
include 'connect.php';
$sql = "select * from deverificat";
$result = $conn->query($sql);
if($result->num_rows>0){
	echo "<table border='1'><tr>
		<th>ID</th>
		<th>Nume</th>
		<th>Comentariu</th>
		</tr>";
	while($row = $result->fetch_assoc()) {
        echo "<tr>
        	<td>".$row["id"]."</td>
        	<td>".$row["name"]."</td>
        	<td>".$row["comm"]."</td>
        	</tr>";
    }
    echo "</table>";
}
else{
	echo "Nu sunt comentarii de verificat";
}
?>

<form action="adauga.php" method="post">
		<p>
			Comentariu aprobat:
			<?php
			$sql = "select id from deverificat";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				echo "<select id='com' name='com'>";
				while($row=$result->fetch_assoc()){
					echo "<option value='".$row["id"]."'>".$row["id"]."</option>";
				}
				echo "</select>";
			}
			?>
		</p>
		<input type="submit" value="Adauga"> 
	</form>

</body>
</html>