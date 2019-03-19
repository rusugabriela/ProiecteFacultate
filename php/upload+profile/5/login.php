<html>
<head>
	<style>table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}
</style>
</head>
<body>
<?php
	$conn=new mysqli("localhost","root","","profil");
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
	function getFromPostUsername()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$Username=test_input($_POST["Username"]);
			return $Username;
		}
	}
	function getFromPostPassword()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$Password=test_input($_POST["Password"]);
			return $Password;
		}
	}
	function login()
	{
		global $conn;
		$Username=getFromPostUsername();
		$Password=getFromPostPassword();

		if($conn->connect_error)
		{
			die("Connection failed: ". $conn->connect_error);
		}
		$query="select Username from Users where Username='". $Username."' and Password='".$Password."'";
		$result=$conn->query($query);
		if($result->num_rows>0)
		{
			header("location:Users"."?user=".$Username);
		}
		else
			{
                echo "<div class='alert alert-warning'>
                <strong>Warning!</strong> User sau parola gresita!
                </div>";
            }
			//header("location:index.php");
			
		$conn->close();
}
	login();
?>
</body>
</html>