<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		$conn=new mysqli("localhost","root","","profil");
		$query="select URL,Username from Imagini";
		$result=$conn->query($query);
		echo "<form method='POST' action='delete.php'>";
		$i=0;
		while($row=$result->fetch_assoc())
		{
			if($i==0)
			{
				echo "<input type='hidden' name='username' value='".$row["Username"]."'>";
				$i=1;
			}
			echo "<input type='radio' name='poza' value='".$row["URL"]."'>";
			echo "<img src=".$row["URL"].".jpg height='100' width='100'><br>";
		}
		echo "<input type='submit'>";
		echo "</form>"
	?>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	    <input type='hidden' name='var' value="<?php
		echo $_GET['user'];
	?>"/>
	</form>

</body>
</html>