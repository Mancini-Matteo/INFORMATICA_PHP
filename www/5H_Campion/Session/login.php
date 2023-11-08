<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In by Luca Campion</title>
</head>
<body>
    <h2>Richiesta credenziali per accedere alla pagina riservata<br></h2>
    <form name="frmLogin" action="login.php" method="POST">
        <label for="username">Username:</label>
          <input type="text" name="username" required><br>
        <label for="password">Password:</label>
          <input type="password" name="password" required>
         <input type="submit" value="Invio">        
    </form>
</body>
</html>
