<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Raspuns adaugare nota!</title>
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

        $studId = $_POST["student"];
        $materieId = $_POST["materie"];
        $nota = $_POST["nota"];

        if($studId==""  || $materieId=="" || $nota==""){
            echo "<div class='alert alert-warning'>
                    <strong>Warnin!</strong> Câmpurile nu pot fi goale!
                  </div>";
        }

        elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $studId)
                    ||
               preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $materieId)
                    ||
                preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $nota))
                {
                    echo "<div class='alert alert-danger'>
                    <strong>Danger!</strong> Câmpurile nu pot conține caractere speciale cu excepția '-._' !
                    </div>";
                }

        elseif($nota > 10 || $nota < 1){
            echo "<div class='alert alert-warning'>
                    <strong>Warning!</strong> Nota invalida!
                  </div>";
        }
                
        else{
            
            $sql = "insert into note (StundentId, MaterieId, Nota) values ('$studId','$materieId','$nota')";
            
            if($connection->query($sql) == TRUE){
                echo "<div class='alert alert-success'>
                <strong>Succes!</strong> Nota adaugata cu succes!
                </div>";
            }
            else
            {
                echo "<div class='alert alert-danger'>
                <strong>Danger!</strong> Nota nu a fost adaugata!
                </div>";
            }
        }

    ?>
</body>
</html>