<?php
session_start();
    include "funz_login.php";

    verificaAutenticazione();
    isAccountBloccato($username);
    if (isAccountBloccato($username)) {
        // Sposta la chiamata a sbloccaAccountAutomaticamente qui
        sbloccaAccountAutomaticamente($username);
    
        // Debug: Stampa messaggio di debug
        echo "Account bloccato. Tentativi rimanenti: " . ($_SESSION['max_tentativi_errati'] - $_SESSION['tentativi_errati'][$username]);
    
        // Debug: Stampa timestamp di sblocco previsto
        echo "Sblocco previsto alle: " . date('Y-m-d H:i:s', $_SESSION['tempo_sblocco'][$username]);
    
        header('Location: index.php');
        exit;
    }
    gestisciLogin();
    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Accesso</h1>

    <form method="POST" action="">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Accedi">
    </form>
</body>
</html>
