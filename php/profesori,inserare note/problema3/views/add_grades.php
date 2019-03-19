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
    <form action="../insert_grades_post.php" method="post">
        <div class="form-group">
            <select class="custom-select" title="student" name="student"  required>
                <option value="" selected disabled>Selecteaza student</option>
                <?php

                foreach ($studenti as $student) {
                    echo "<option value='" . $student['id'] . "''>" . $student['nume'] . "</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <select class="custom-select" title="materie" name="materie" required>
                <option value="" selected disabled>Selecteaza materie</option>
                <?php
                foreach ($materii as $materie) {
                    echo "<option value='" . $materie['id'] . "''>" . $materie['nume'] . "</option>";
                } ?>
            </select>
        </div>

        <div class="form-group">
            <select class="custom-select" title="nota" name="nota" required>
                <option value="" selected disabled>Selecteaza nota</option>
                <?php
                for ($i=1; $i<=10;$i++){
                    echo "<option value='" .$i. "''>" . $i . "</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" value="Adauga nota">
        </div>

    </form>
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



