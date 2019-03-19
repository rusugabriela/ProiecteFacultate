<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Home</a>
        <ul class="nav nav-pills">
            <?php
            if (isset($_SESSION['id'])) {
                echo ' <li class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a>
                        </li>';
				echo ' <li class="nav-item">
                <a class="nav-link" href="insert_contacts.php">Inserare</a>
                        </li>';
				echo ' <li class="nav-item">
                <a class="nav-link" href="agenda.php">Agenda mea</a>
                        </li>';
            } else {
                echo ' <li class="nav-item">
                <a class="nav-link" href="login.php">Log in</a>
                        </li>';
            }
            ?>
        </ul>
    </div>
</header>

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
</body>


</html>