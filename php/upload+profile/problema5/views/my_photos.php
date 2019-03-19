<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style>
        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .top-right {
            position: absolute;
            top: 5px;
            right: 275px;
        }
    </style>
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
<br>
<h1 align="center">
    These are your photos:
</h1>
<br>
<br>
<?php
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo '<div class="row"><div class="col-4 offset-4"><div class="alert alert-danger">' . $error . '</div></div></div>';
    }
    unset($_SESSION['errors']);
} ?>

<?php if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {
        echo '<div class="row"><div class="col-4 offset-4"><div class="alert alert-success">' . $message . '</div></div></div>';
    }
    unset($_SESSION['messages']);
} ?>


<?php
foreach ($images as $image) { ?>
    <div class="container">
        <figure class='figure'>
            <?php echo "<img src='images/" . $image['url'] . "' class='figure-img img-fluid rounded img-thumbnail'" . "style='width:600px'" . ">"; ?>
            <a class="btn btn-dark top-right" href="../delete_photo.php?id=<?= $image["id"] ?>"> &#x274C </a>

        </figure>
    </div>
    <?php

}


?>


</body>
</html>
