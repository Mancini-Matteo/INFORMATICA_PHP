<?php
session_start();

// Verifica se l'utente è autenticato
if ( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}

echo "<h1>Benvenuto</h1>";
echo "Ciao ".$_SESSION['username'].", sei autenticato. Benvenuto";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Benvenuto</title>
</head>
<body>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
