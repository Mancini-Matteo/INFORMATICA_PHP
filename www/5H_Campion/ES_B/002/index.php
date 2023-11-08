<!DOCTYPE html>
<html>
<head>
    <title>Pagina PHP di Saluto</title>
</head>
<body>
<?php
// Imposta il nome
$nome = "Luca";

// Ottieni l'ora corrente
$ora_corrente = date("H:i:sa");

// Determina il saluto in base all'ora corrente
if ($ora_corrente >= "8:00:00" || $ora_corrente <= "12:00:00") {
    $saluto = "Buongiorno";
} elseif ($ora_corrente >= "12:00:00" || $ora_corrente <= "20:00:00") {
    $saluto = "Buonasera";
} else {
    $saluto = "Buonanotte";
}

// Ottieni il tipo di browser dell'utente
$browser = $_SERVER['HTTP_USER_AGENT'];

// Stampare il saluto e il tipo di browser
echo "$saluto $nome, benvenuta nella mia prima pagina PHP.<br>";
echo "Sono le $ora_corrente. <br>"; 
echo "Stai usando il browser: $browser";
?>
</body>
</html>
