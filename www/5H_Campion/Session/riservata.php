<?php
        session_start();

        // Verifica se l'utente è autenticato
   if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) { // Se l'utente non è autenticato, reindirizza alla pagina di accesso
      if ($_SESSION["username"] !== "Utente" && $_SESSION["password"] !== "password") {
              header("Location: login.php");
             exit;
        }
    }
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
