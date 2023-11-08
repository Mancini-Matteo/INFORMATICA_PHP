<!DOCTYPE html>
<html>
<head>
    <title>Calcolo Quadrati e Cubi</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processa i dati del modulo se il modulo è stato inviato
    $numero = $_POST["numero"];
        echo "<h2>Tabella dei Quadrati e Cubi da 1 a $numero</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Numero</th><th>Quadrato</th><th>Cubo</th></tr>";
        for ($i = 1; $i <= $numero; $i++) {
            $quadrato = $i * $i;
            $cubo = $i * $i * $i;
            echo "<tr><td>$i</td><td>$quadrato</td><td>$cubo</td></tr>";
        }
        echo "</table>";
} else {
    // Mostra il modulo per l'input del numero
    ?>
    <h2>Inserisci un numero intero compreso tra 1 e 10</h2>
    <form method="post" action="">
        <label for="numero">Seleziona un numero:</label>
        <select name="numero" >
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Crea tabella">
    </form>
    <?php
}
?>
</body>
</html>