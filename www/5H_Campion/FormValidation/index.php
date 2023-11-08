<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormValidation</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errore = 0;
        //Controllo che i pattern siano rispettati così da assegnare con sicurezza dati corretti alle variabili 
        if(!preg_match("/[a-zA-Z\s]+/", $_POST["nome"])) {
            echo "Attenzione! Formato del nome non rispettato";   //Il pattern non è rispettato, visualizza un messaggio di errore

            $errore = 1;
        }else {
            $nome = $_POST["nome"];
        }
        if(!preg_match("/^[a-zA-Z\s]+$/", $_POST["cognome"])) {
            echo "Attenzione! Formato del cognome non rispettato";   

            $errore = 1;
        }else {
            $cognome = $_POST["cognome"];
        }
        if(!preg_match("/^[A-Z]{6}[0-9]{2}[A-Z]{1}[0-9]{2}[A-Z]{1}[A-Z0-9]{4}$/", $_POST["CodiceFiscale"])) {
            echo "Attenzione! Formato del codice fiscale non rispettato";   

            $errore = 1;
        }else {
            $cod_Fiscale = $_POST["CodiceFiscale"];
        }
        if(!preg_match("/[0-9]{10}/", $_POST["cellulare"])) {
            echo "Attenzione! Formato del cellulare non rispettato";   

            $errore = 1;
        }else {
            $cellulare = $_POST["cellulare"];
        }
        if(!preg_match("/^[a-zA-Z\s0-9]+$/", $_POST["indirizzo"])) {
            echo "Attenzione! Formato dell'indirizzo non rispettato";   

            $errore = 1;
        }else {
            $indirizzo = $_POST["indirizzo"];
        }
        if(!preg_match("/[a-zA-Z\s]+/", $_POST["nickname"])) {
            echo "Attenzione! Formato del nickname non rispettato";   

            $errore = 1;
        }else {
            $nickname = $_POST["nickname"];
        }
        if(!preg_match("/[a-zA-Z0-9@#$%^&+=!*_]{8,}/", $_POST["password"])) {
            echo "Attenzione! Formato della password non rispettato";   

            $errore = 1;
        }else {
            $password = $_POST["password"];
        }
        //Rimozione di eventuali spazi superflui 
        $nome = trim($_POST["nome"]);
        $cognome = trim($_POST["cognome"]);
        $cod_Fiscale = trim($_POST["CodiceFiscale"]);
        $email = trim($_POST["email"]);
        $cellulare = trim($_POST["cellulare"]);
        $nickname = trim($_POST["nickname"]);
        //Controllo che il campo nickname sia diverso dal campo nome e cognome
        if($_POST["nickname"] == $_POST["nome"] || $_POST["nickname"] == $_POST["cognome"]) {
            echo "Attenzione! Il nickname deve essere diverso da nome e cognome";

            displayForm();
        }
        //Controllo che l'email inserita dall'utente sia valida
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo "Attenzione! Indirizzo email non valido <br>";

            $errore = 1;
        }else {
            $email = $_POST["email"];
        }

        $data = $_POST["data"];

        //Controllo che i dati inseriti siano sicuri senza strani caratteri speciali
        $nome = htmlspecialchars($nome);
        $cognome = htmlspecialchars($cognome);
        $cod_Fiscale = htmlspecialchars($cod_Fiscale);
        $nickname = htmlspecialchars($nickname);
        $cellulare = htmlspecialchars($cellulare);
        $indirizzo = htmlspecialchars($indirizzo);
        $data = htmlspecialchars($data);

        if($errore === 0){
            displayData ();
        }else {
            echo "<br>Ops! Qualcosa è andato storto";
            displayForm();
        }
    }else {
        displayForm();
    }

    function displayForm () {
        echo '<form method="POST" action="">
        Nome: <input type="text" name="nome" placeholder="nome" pattern="[a-zA-Z\s]+" required><br>
        Cognome: <input type="text" name="cognome" placeholder="cognome" pattern="^[a-zA-Z\s]+$" required><br>
        Data di Nascita: <input type="date" name="data" required><br>
        Codice Fiscale: <input type="text" name="CodiceFiscale" placeholder="RSSMRA85T10A562S" pattern="^[A-Z]{6}[0-9]{2}[A-Z]{1}[0-9]{2}[A-Z]{1}[A-Z0-9]{4}$"><br>
        Email: <input name="email" placeholder="name@example.com" type="email" required><br>
        Cellulare: <input type="tel" name="cellulare" placeholder="333 123 4567" pattern="[0-9]{10}"><br>
        Indirizzo: <input type="text" name="indirizzo" placeholder="Via Giuseppe Verdi 10" pattern="^[a-zA-Z\s0-9]+$" required><br>
        Nickname: <input type="text" name="nickname" placeholder="nickname" pattern="[a-zA-Z\s]+" required><br>
        Password: <input type="password" name="password" placeholder="password" pattern="[a-zA-Z0-9@#$%^&+=!*_]{8,}" required><br>
        <input type="submit" value="Registrati">
    </form>';
    }
    function displayData () {
        global $nome; global $cognome; global $data; global $cod_Fiscale; global $email; global $cellulare; global $indirizzo; global $nickname; global $password;
        echo "Nome: $nome <br>";
        echo "Cognome: $cognome <br>";
        echo "Data di nascita: $data <br>";
        echo "Codice fiscale: $cod_Fiscale <br>";
        echo "Email: $email <br>";
        echo "Cellulare: $cellulare <br>";
        echo "Indirizzo: $indirizzo <br>";
        echo "Nickname: $nickname <br>";
        echo "Password: $password <br>";
    }
    ?>

    
</body>
</html>