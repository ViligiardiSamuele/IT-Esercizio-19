<?php
$mysqli = new mysqli("localhost", "root", null, "es19", 3306)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$video = mysqli_query($mysqli, "select ID, titolo from Video")
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$soci = mysqli_query($mysqli, "select ID, cognome, nome from Soci")
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
            <h5 class="card-title text-center">Noleggia un video</h5>
            <form action="confermaNoleggio.php" method="post">
                <select class="form-select mb-3" name="IDvideo">
                    <option selected>Video</option>
                    <?php
                    while ($row = mysqli_fetch_array($video, MYSQLI_ASSOC)) {
                        echo '<option value = "' . $row['ID'] . '">' . $row['titolo'] . '</option>';
                    }
                    ?>
                </select>
                <select class="form-select mb-3" name="IDsocio">
                    <option selected>Socio</option>
                    <?php
                    while ($row = mysqli_fetch_array($soci, MYSQLI_ASSOC)) {
                        echo '<option value = "' . $row['ID'] . '">' . $row['cognome'] . ' - ' . $row['nome'] . '</option>';
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