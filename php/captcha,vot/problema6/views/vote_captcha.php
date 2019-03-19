<?php session_start();?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body style="height: 100%" class="d-flex align-items-center">
<div class="col-4 offset-4 mt-5">
    <form method="post" action="../vote.php">
        <div class="form-group">
            <img src="../captcha.php" height='100' width='200'/>
        </div>
        <div class="form-group">
            <label for="captcha">Introduceti codul pentru a vota: </label>
            <input class="form-control" type="text" name="captcha" id="captcha" required>
        </div>
        <div>
            <input type="hidden" id="idv" name="idv" value="<?= $_GET['id'] ?>"
        </div>
        <div class="form-group ">
            <input class="btn btn-primary btn-block" type="submit" value="Vote"/>
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