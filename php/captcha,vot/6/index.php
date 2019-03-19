<?php
session_start();
//print_r($_SESSION);?>
<html>
    <head>
        <title>Concurs poze</title>
        <style type="text/css">
            .images{
                height: 450px;
                width: 800px;
            }
        </style>
    </head>
    <body>
<?php
$connection = mysqli_connect("localhost","root","","concursPoze");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die;
}

$query = mysqli_query($connection,"SELECT id, Titlu, Imagine, Voturi FROM Poze ORDER BY Voturi DESC");

if (!$query){
	echo "Failed to retrieve data! ";
	die;
}

//$_SESSION["code"]."grgndjfr";
if (isset($_POST["vote"]) && $_POST["captcha1"] == $_SESSION["code"]){
	$id = mysqli_real_escape_string($connection, $_GET["id"]);
	$q = mysqli_query($connection, 'UPDATE Poze SET Voturi = Voturi+1 WHERE id = "'.$id.'"');
	
	header('Location: index.php');
}
?>

        <div class="main_wrapper">
			<h1>Pozele din concurs</h1>
			<?php while($row = mysqli_fetch_assoc($query)){ ?>
                <div class="post">
                    <div>
                        <h2><?php echo $row["Titlu"] . " (" . $row["Voturi"] . " voturi)"; ?></h2>
                    </div>
                    <img class="images" src="img/<?=$row["Imagine"]?>" alt="<?=$row["Titlu"]?>" />
                    <div class="vot">
                        <form method="POST" action="index.php?id=<?=$row["id"]?>">
                            <div>
                                <br><b>Introduceti codul urmator pentru a vota:</b><br>
                                <img src="captcha.php" height='25' width='50'/>
                                <input type="text" name="captcha1" value=""/>
                                <input type="submit" name="vote" value="Vote" /></div>
                        </form>
                    </div>
                </div>
			<?php } ?>
        </div>
    </body>

</html>