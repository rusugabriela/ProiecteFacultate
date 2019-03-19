<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body style="height: 100%" class="d-flex align-items-center">
<div class="col-4 offset-4">
    <form action="../result.php">
        <div class="form-group">
            <select class="custom-select" title="plecare" name="plecare" required>
                <option value="" selected disabled>Selecteaza oras de plecare</option>
                <?php
                global $plecari;
                foreach ($plecari as $plecare) { ?>
                    <option value="<?= $plecare['localitate_plecare'] ?>"><?= $plecare['localitate_plecare'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <select class="custom-select" title="sosire" name="sosire" required>
                <option value="" selected disabled>Selecteaza destinatie</option>
                <?php
                global $sosiri;
                foreach ($sosiri as $sosire) {
                    echo "<option value='" . $sosire['localitate_sosire'] . "'>" . $sosire['localitate_sosire'] . "</option>";
                } ?>
            </select>
        </div>
        <div class="form-check form-group">
            <input class="form-check-input" type="checkbox" value="true" id="legaturiCheckbox" name="legaturi">
            <label class="form-check-label" for="legaturiCheckbox">
                Doresc si curse cu legatura
            </label>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" value="Search">
        </div>


    </form>
</div>


</body>


</html>
