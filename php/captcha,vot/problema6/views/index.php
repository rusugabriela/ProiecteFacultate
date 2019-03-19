<?php session_start(); ?>
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
            right: 100px;
        }
    </style>
</head>
<body>
<br>
<h1 align="center">
    Votati poza preferata!
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
            <?php echo "<img src='" . $image['url'] . "' class='figure-img img-fluid rounded img-thumbnail'" . "style='width:950px; height:650px'" . ">"
                . "<figcaption class='figure-caption'> " . $image['titlu'] . "(" . $image['voturi'] . " voturi) </figcaption>"; ?>
            <a class="btn btn-dark top-right" href="../vote_captcha.php?id=<?= $image["id"] ?>">&#10084 Voteaza</a>

        </figure>
    </div>
    <?php

}


?>


</body>
</html>
