<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="col-8 offset-2 mt-5">

    <table class="table table-hover table-borderless">
        <thead>
        <tr>
            <th>Nr. Tren</th>
            <th>Plecare</th>
            <th>Ora plecare</th>
            <th>Sosire</th>
            <th>Ora sosire</th>
        </tr>
        </thead>
        <?php
        global $result;
//        if (empty($result)) echo "Nu exista trenuri intre aceste localitati";
        foreach ($result as $trenuri) {
            echo "<tbody class='border-top border-dark'>";
            foreach ($trenuri as $tren) { ?>
                <tr>
                    <td><?= $tren['nr_tren'] ?></td>
                    <td><?= $tren['localitate_plecare'] ?></td>
                    <td><?= strftime("%H:%M", strtotime($tren['ora_plecare'])) ?></td>
                    <td><?= $tren['localitate_sosire'] ?></td>
                    <td><?= strftime("%H:%M", strtotime($tren['ora_sosire'])) ?></td>
                </tr>
            <?php }
            echo "</tbody>";
        } ?>

    </table>

    <a href="../index.php" class="btn btn-secondary btn-outline btn-block">Back to search</a>
</div>


</body>


</html>
