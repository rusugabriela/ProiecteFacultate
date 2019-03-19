<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Catalog</title>
    </head>
<body>

<?php

    
	$conn=new mysqli("localhost","root","","studenti");

	if($conn->connect_error)
	{
		die("Connection failed: ". $conn->connect_error);
	}

    $query = "select s.StundentId,s.Nume,s.Prenume,n.Nota,m.NumeM from studenti as s join note as n on s.StundentId=n.StundentId join materii m on n.MaterieId=m.MaterieId";

    $result=$conn->query($query);

    if($result->num_rows>0)
	{
		echo "<table class='table-hover table-striped table-bordered' style='margin-left:auto; margin-right:auto; position:relative;'>
                <tr><th>StudentId</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Nota</th>
                    <th>Materie</th>
                </tr>";
		while(($row=$result->fetch_assoc()))
		{
            echo '<tr><td>'.$row['StundentId'].'</td><td>'.$row['Nume'].'</td><td>'.$row['Prenume'].'</td><td>'.$row['Nota'].'</td><td>'.$row['NumeM'].'</td></tr><br>';
        }
        
        echo "</table>";
	}


?>

</body>
</html>