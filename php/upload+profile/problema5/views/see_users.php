<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Home</a>

        <ul class="nav nav-pills">

            <ul class="nav">
                <?php
                if (isset($_SESSION['id'])) {
                    echo ' <li class="nav-item">
                <a class="nav-link" href="../upload.php">Upload photos</a>
                        </li>';
                    echo ' <li class="nav-item">
                <a class="nav-link" href="../see_photos.php">See my photos</a>
                        </li>';
                    echo ' <li class="nav-item">
                <a class="nav-link" href="../see_user.php">See other users</a>
                        </li>';
                } ?>
            </ul>
            <?php
            if (isset($_SESSION['id'])) {
                echo ' <li class="nav-item">
                <a class="nav-link" href="../logout.php">Log out</a>
                        </li>';
            } else {
                echo ' <li class="nav-item">
                <a class="nav-link" href="../login.php">Log in</a>
                        </li>';
            }
            ?>


        </ul>


    </div>
</header>
<ul>
    <?php foreach($result as $row){
        echo '<li> <a href="../see_user_photos.php?id='.$row['id'].'">'. $row['username'].'</a> </li>';

    }?>
</ul>


</body>
</html>