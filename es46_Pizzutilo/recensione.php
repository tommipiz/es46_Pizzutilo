<?php
    include 'connessione.php'; // File per la connessione al database
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php
    // Recupero delle recensioni
    $sql = "SELECT recensioni.id, film.titolo, recensioni.voto, utenti.username 
            FROM recensioni
            JOIN film ON recensioni.id_film = film.id
            JOIN utenti ON recensioni.id_utente = utenti.id";
    $result = $conn->query($sql);
    ?>

    <h2>Elenco Recensioni</h2>
    <form action="eliminarecensioni.php" method="post">
        <table>
            <tr>
                <th>Titolo Film</th>
                <th>Voto</th>
                <th>Utente</th>
                <th>Seleziona</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["titolo"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["voto"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "<td><input type='checkbox' name='val[]' value='" . $row["id"] . "'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nessuna recensione trovata</td></tr>";
            }
        ?>
        </table>
        <br>
    <button type="submit">ELIMINA</button>
</form>

</body>
</html>
