<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="col-8 offset-2 mt-5">
    <form action="../index.php">
        <div class="form-group">
            <select class="custom-select" title="nrResultsPerPage " name="nrResultsPerPage"
                    onchange='this.form.submit()'>
                <option selected disabled>Nr rezultate pe pagina</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="30">30</option>

            </select>
        </div>
    </form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nr</th>
            <th>Nume</th>
            <th>Cod Produs</th>
            <th>Pret</th>
        </tr>
        </thead>

        <?php
        echo "<tbody >";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nume"] . "</td><td>" . $row["cod"] . " </td><td>" . $row["pret"] . "</tr>";
        }

        echo "</tbody>";
        ?>
    </table>
    <div class="float-right">
        <?php
        if ($numberOfPages >=2) {
            echo "Mergi la pagina:";
            for ($page = 1; $page <= $numberOfPages; $page++) {
                echo '<a href="index.php?page=' . $page . '&nrResultsPerPage=' . $nrResultsPerPage . '">' . $page . ' </a>';
            }
        }

        ?>
    </div>


</div>
</body>


</html>
