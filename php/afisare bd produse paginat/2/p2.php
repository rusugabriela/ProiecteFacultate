<!DOCTYPE html>
    <head>
    <title>Produse</title>
	<style>
	table {
    border-collapse: collapse;
    width: 100%;
	}

	th, td {
    text-align: left;
    padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
    background-color: #4CAF50;
    color: white;
	}
	</style>
    </head>
<body>

<?php
	
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	$nrResultsPerPage=0;
	$page=1;

	$conn=new mysqli("localhost","root","","produse");

	if($conn->connect_error)
	{
		die("Connection failed: ". $conn->connect_error);
	}

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$nrResultsPerPage=test_input($_POST["nrResultsPerPage"]);
		$nrResultsPerPage=(int)$nrResultsPerPage;
	}

	if(isset($_GET["page"]))
	{
			$page=(int)test_input($_GET["page"]);
	}

	if(isset($_GET["nrResultsPerPage"]))
	{
			$nrResultsPerPage=(int)test_input($_GET["nrResultsPerPage"]);
	}

	$thisPageFirstResult=($page-1)*$nrResultsPerPage;
	
	$firstQuery="select * from Produse";
	$query="select * from Produse LIMIT ". $thisPageFirstResult . "," . $nrResultsPerPage;

	$resultForIndex=$conn->query($firstQuery);
	$nrOfResults=mysqli_num_rows($resultForIndex);
	$numberOfPages=ceil($nrOfResults/$nrResultsPerPage);
	
	$result=$conn->query($query);
	if($result->num_rows>0)
	{
		echo "<table class='table-hover table-striped table-bordered' style='margin-left:auto; margin-right:auto; position:relative;'>
                <tr><th>ProdusId</th>
                    <th>Nume</th>
                    <th>Cantitate</th>
                    <th>Pret</th>
                </tr>";
		while(($row=$result->fetch_assoc()))
		{
            echo '<tr><td>'.$row['Pid'].'</td><td>'.$row['Nume'].'</td><td>'.$row['NrProduse'].'</td><td>'.$row['Pret'].'</td></tr><br>';
		}
	}
	echo "<tr><td  colspan='4'>";

    for($page=1; $page <= $numberOfPages; $page++){
        echo '<a href="p2.php?page=' . $page . '&nrResultsPerPage=' . $nrResultsPerPage .'">'.$page.' </a>';
    }

    echo "</td></tr></table>";

	$conn->close();
?>


</body>
</html>