<?php
$mysqli = new mysqli("localhost", "root", null, "es19", 3306)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$response = mysqli_query($mysqli, "select titolo, regista, anno, tipo from Video where IDgenere = " . $_GET['genere'])
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
            <ul class="list-group list-group-flush">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Regista</th>
                            <th scope="col">Anno</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
                            echo '
                            <tr>
                                <th scope="row">'.$row['titolo'].'</th>
                                <td>'.$row['regista'].'</td>
                                <td>'.$row['anno'].'</td>
                                <td>'.$row['tipo'].'</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>