<?php
        session_start();

        // Verifica se l'utente è autenticato
    if (!empty($_SESSION["username"]) || !empty($_SESSION["password"])) {
        // Se l'utente non è autenticato, reindirizza alla pagina di accesso
        header('Location: login.php');
        exit;
        }
        echo "<h1>Benvenuto<h1><br>Sei dentro la pagina riservata!";
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Benvenuto</title>
</head>
<body>
    <h1>Benvenuto</h1>

    <p>Ciao, sei autenticato. Benvenuto!</p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
