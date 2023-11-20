<?php

// Funzione per verificare l'autenticazione dell'utente
function verificaAutenticazione() {
    session_start();

    // Verifica se l'utente è autenticato
    return isset($_SESSION["username"]);
}

// Funzione per gestire il processo di login
function gestisciLogin() {
    session_start();

    // Verifica se l'utente è già autenticato e reindirizza alla pagina di benvenuto
    if (verificaAutenticazione()) {
        header('Location: riservata.php');
        exit;
    }

    // Verifica se il modulo di accesso è stato inviato
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";

        // Verifica le credenziali e gestisce il blocco degli account
        if (verificaCredenziali($username, $password)) {
            // Credenziali corrette, crea una variabile di sessione per l'autenticazione
            $_SESSION["username"] = $username;
            header('Location: riservata.php');
            exit;
        } else {
            gestisciBloccoAccount($username);
            echo 'Credenziali non valide. Riprova. <br>';
            echo "I tuoi tentavi errati: ".$_SESSION['tentativi_errati'][$username]."";
        }
    }
}

// Funzione per verificare le credenziali dell'utente
function verificaCredenziali($username, $password) {
    // Implementa la logica di verifica delle credenziali (ad esempio, confronto con un database)
    return $password === "password";
}

// Funzione per gestire il blocco degli account
function gestisciBloccoAccount($username) {
    $maxTentativiErrati = 3; // Numero massimo di tentativi errati prima del blocco
    $tempoBlocco = 15; // Tempo di blocco in secondi

    if (!isset($_SESSION['tentativi_errati'][$username])) {
        $_SESSION['tentativi_errati'][$username] = 0;
    }

    $_SESSION['tentativi_errati'][$username]++;

    if ($_SESSION['tentativi_errati'][$username] >= $maxTentativiErrati) {
        bloccaAccountTemporaneamente($username, $tempoBlocco);
        header('Location: index.php');
        exit;
    }
}

// Funzione per bloccare temporaneamente un account
function bloccaAccountTemporaneamente($username, $tempoBlocco) {
    $_SESSION['account_bloccato'][$username] = true;
    $_SESSION['tempo_sblocco'][$username] = time() + $tempoBlocco;
}

// Funzione per verificare se un account è bloccato
function isAccountBloccato($username) {
    return isset($_SESSION['account_bloccato'][$username]) && $_SESSION['account_bloccato'][$username];
}

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
// Funzione per sbloccare automaticamente un account dopo un certo periodo
function sbloccaAccountAutomaticamente($username) {
    if (isset($_SESSION['tempo_sblocco'][$username]) && time() > $_SESSION['tempo_sblocco'][$username]) {
        unset($_SESSION['account_bloccato'][$username]);
        unset($_SESSION['tentativi_errati'][$username]);
        unset($_SESSION['tempo_sblocco'][$username]);
    }
}
?>
