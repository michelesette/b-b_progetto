<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanifica i dati
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Verifica l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Indirizzo email non valido.";
        exit;
    }

    // Imposta il destinatario e l'oggetto
    $to = "nicomorigi33@libero.it";
    $subject = "Nuovo messaggio dal form di contatto";

    // Corpo dell'email
    $body = "Hai ricevuto un nuovo messaggio dal form di contatto.\n\n" .
            "Indirizzo Email: $email\n" .
            "Cellulare: $phone\n" .
            "Messaggio:\n$message";

    // Intestazioni dell'email
    $headers = "From: nicomorigi33@libero.it\r\n" .    // Mittente dal tuo dominio
               "Reply-To: $email\r\n" .                 // Risponderai all'utente
               "MIME-Version: 1.0\r\n" .                // Specifica la versione MIME
               "Content-Type: text/plain; charset=UTF-8\r\n" .  // Contenuto come testo semplice
               "X-Mailer: PHP/" . phpversion();         // Informazioni sulla versione di PHP

    // Invia l'email e controlla se è stata inviata con successo
    if (mail($to, $subject, $body, $headers)) {
        echo "Messaggio inviato con successo!";
    } else {
        echo "Si è verificato un errore nell'invio del messaggio.";
    }
}
?>