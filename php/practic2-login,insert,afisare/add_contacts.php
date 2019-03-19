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


<div class="col-8 offset-2 mt-5">
    <form action="insert_contacts_post.php" method="post">
        <div class="form-group">
                <label for="namecontact">Nume</label>
                <input type="text" class="form-control" id="namecontact" name="namecontact" required>
            </div>
            <div class="form-group">
                <label for="prenume">Prenume</label>
                <input type="text" class="form-control" id="prenume" name="prenume" required>
            </div>
       
		<div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" required>
            </div>
            <div class="form-group">
                <label for="adresa">Adresa</label>
                <input type="text" class="form-control" id="adresa" name="adresa">
            </div>
			<div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
			<label for="foto">Fotografie</label>
			<?php
			//echo'<label for="foto">fotografie</label>';
			 echo ' <li class="nav-item">
                <a class="nav-link" href="upload.php">Upload photo</a>
                        </li>';
			?>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data">
            </div>
			
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Adauga contact" name="submit">
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