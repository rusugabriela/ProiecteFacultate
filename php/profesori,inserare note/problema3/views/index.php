<?php session_start();?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Home</a>

        <ul class ="nav">
            <?php
            if (isset($_SESSION['id'])) {
                echo ' <li class="nav-item">
                <a class="nav-link" href="../insert_grades.php">Add grades</a>
                        </li>';
            }?>
        </ul>
        <ul class="nav nav-pills">

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

<div class="col-8 offset-2 mt-5">
    <table class="table table-hover">
        <thead>
        <tr>

            <th>Nume Student</th>
            <th>Nota</th>
            <th>Materia</th>
        </tr>
        </thead>

        <?php
        echo "<tbody >";
        global $result;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["numeS"] . "</td><td>" . $row["nota"] . " </td><td>" . $row["numeM"] . "</tr>";
        }

        echo "</tbody>";
        ?>
    </table>


</div>
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
