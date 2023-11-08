<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in by Luca Campion</title>
</head>
<body>
    <h2>Credenziali richieste per l'accesso alla pagina riservata<br></h2>
<?php
$utente = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    // Controlla se il form è stato inviato tramite POST
    if (isset($_POST["Luca"])) {    //Controlla se il campo è compilato ed inviato
        $utente = $_POST["Luca"];   //Assegna il valore alla variabile
    }
    if (isset($_POST["WordPass"])) {
        $password = $_POST["WordPass"];
    }

    if ($utente == "Luca" && $password == "WordPass") {     //Controlla se le credenziali inserite sono corrette
        echo "<h3>Benvenuto $utente sei entrato nell'area riservata!</h3>";     //Stampa messaggio di benvenuto
    } else {
        echo "Attenzione, nome o password errati!";     //Stampa messaggio di errore
        //Ripropone il form
        echo '<form name="frmLogin" action="" method="POST">    
         Username: <input type="text" name="Luca" required><br>
         Password: <input type="password" name="WordPass" required>
        <input type="submit" value="Invio" >
</form>';
    }
} 
else {  //Stampa del form
    echo '<form name="frmLogin" action="" method="POST">
    Username: <input type="text" name="Luca" required><br>
    Password: <input type="password" name="WordPass" required>
    <input type="submit" value="Invio" >
</form>';
}
?>
</body>
</html>