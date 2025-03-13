<?php
    include "connessione.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina</title>
</head>
<body>
    <?php
    $ids = $_POST['val'];

    if (!empty($ids)) {
        $id_string = implode(",", array_map('intval', $ids));
        $sql = "DELETE FROM recensioni WHERE id IN ($id_string)";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Le seguenti recensioni sono state eliminate con successo:</p>";
            echo "<ul>";
            foreach ($ids as $id) {
                echo "<li>ID recensione: " . htmlspecialchars($id) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Errore nell'eliminazione delle recensioni.</p>";
        }
    } else {
        echo "<p>Nessuna recensione selezionata per l'eliminazione.</p>";
    }

    $conn->close();
    ?>

    
    
</body>
</html>