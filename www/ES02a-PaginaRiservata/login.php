<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaginaRiservata</title>
</head>
<body>
    <h1>Controllo credenziali</h1>
    <?php
    $utente=$_POST["Lucio"];
    $password=$_POST["MamaHuevo"];
    if  ($utente!="Lucio"||$password!="MamaHuevo") {
        ?>
        <h1>OH! Ma che minchia sta a fé?? Password o nome utente errati!<br> Esatto non ti dico nemmeno qual è sbagliato.</h1>
        <?php
    }   else {
        echo "<h1>We, ciao ". $utente . " sei nell'area riservata!</h1>";
    }
    ?>
</body>
</html>