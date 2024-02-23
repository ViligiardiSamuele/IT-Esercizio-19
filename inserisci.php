<?php
$mysqli = new mysqli("localhost", "root", null, "es19", 3306)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$stmt = $mysqli->prepare("insert into Video(titolo, regista, anno, tipo ,IDgenere) values (?,?,?,?,?)");
$stmt->bind_param("ssisi", $_POST['titolo'], $_POST['regista'], $_POST['anno'], $_POST['tipo'], $_POST['IDgenere']);
$stmt->execute();
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
            <h5 class="card-title text-center">Video inserito con successo!</h5>
            <ul class="list-group list-group-flush">
                <?php
                echo '<li class="list-group-item">Titolo: ' . $_POST['titolo'] . '</li>';
                echo '<li class="list-group-item">Regista: ' . $_POST['regista'] . '</li>';
                echo '<li class="list-group-item">Anno: ' . $_POST['anno'] . '</li>';
                echo '<li class="list-group-item">Tipo: ' . $_POST['tipo'] . '</li>';
                echo '<li class="list-group-item">Genere: ' . $_POST['IDgenere'] . '</li>';
                ?>
            </ul>
            <a href="index.php">Home</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>