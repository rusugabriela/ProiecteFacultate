<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Introducere Note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    <?php
        $connection = new mysqli("localhost","root","","studenti");

        if($connection->connect_error)
        {
            die("Connection failed: ".$connection->connect_error);
        }

        $username = $_POST["user"];
        $password = $_POST["pass"];


        if($username==""  || $password==""){
            echo "<div class='alert alert-warning'>
                    <strong>Warning!</strong> Câmpurile nu pot fi goale!
                  </div>";
        }

        elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $username)
                    ||
               preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $password))
                {
                    echo "<div class='alert alert-danger'>
                    <strong>Danger!</strong> Câmpurile nu pot conține caractere speciale cu excepția '-._' !
                    </div>";
                }
                
        else{
            
            $query = "select * from profesori where Username='$username' and
                                                    Password='$password' ";

            $result = $connection->query($query);

            if($result->num_rows > 0){
                echo "<h2>Adaugare note</h2>
                    <form action='p31.php' method='POST' style='margin: 20px 20px 20px 20px'>
                        <label>Id Student: </label><br>
                        <input type='text' name='student'><br>
                        <label>Id Materie: </label><br>
                        <input type='text' name='materie'><br>
                        <label>Nota: </label><br>
                        <input type='text' name='nota'><br><br>
                        <input type='submit' value='Adauga nota!'>
                    </form>";
            }

            else{
                echo "<div class='alert alert-warning'>
                <strong>Warning!</strong> User sau parola gresita!
                </div>";
            }
        }

    ?>
</body>
</html>