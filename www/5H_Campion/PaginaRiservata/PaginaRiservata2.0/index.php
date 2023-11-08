<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in by Luca Campion</title>
</head>
<body>
<?php
    if(isset($_POST["Invio"])) {
        if(isset($_POST["Lucio"])) {
            $utente=$_POST["Lucio"]; 
        }       
          if(isset($_POST["WordPass"])) {
                $password=$_POST["WordPass"]; 
            }
    }
    else {
        echo "Attenzione, nome o password errati!";
    }
    if($utente!="Lucio"||$password!="WordPass") {
        echo "Attenzione, nome o password errati!";
    }
    else {
        echo "<h3>Benvenuto $utente sei entrato nell'area riservata</h3>";
    }
    ?>
    <h2>Credenziali richieste per l'accesso alla pagina riservata<br></h2>
    <form name="frmLogin" action="" method="POST">
         Username: <input type="text" name="Lucio" required><br>
         Password: <input type="password" name="WordPass" required>
         <input type="submit" value="Invio">        
    </form>
</body> 
</html>