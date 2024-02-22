<?php
$mysqli = new mysqli("localhost", "root", null, "es19", 3306)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$response = mysqli_query($mysqli, "select * from Genere")
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$mysqli->close() or die("Connessione non riuscita" . $mysqli->error . " " . $mysqli->errno);
?>

<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercizio 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <div class="card mx-auto mt-5" style="max-width: 20rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Inserimento nuovo video</h5>
            <form action="inserisci.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="min-width:80px">Titolo</span>
                    <input type="text" name="titolo" class="form-control" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="min-width:80px">Regista</span>
                    <input type="text" name="regista" class="form-control" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="min-width:80px">Anno</span>
                    <input type="number" name="anno" min=1850 class="form-control" aria-describedby="inputGroup-sizing-default">
                </div>
                <select class="form-select mb-3" name="tipo">
                    <option selected>Tipo</option>
                    <option value="VHS">VHS</option>
                    <option value="DVD">DVD</option>
                </select>
                <select class="form-select mb-3" name="IDgenere">
                    <option selected>Genere</option>
                    <?php
                    while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
                        echo '<option value = "' . $row['ID'] . '">' . $row['Descrizione'] . '</option>';
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>