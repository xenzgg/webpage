<?php
    $vorname = $_POST['vorname'];
    $gtag = $_POST['gtag'];
    $email = $_POST['email'];
    $gdatum = $_POST['gdatum'];
    $freitext = $_POST['freitext'];

    if(!empty($email) && !empty($vorname) && !empty($gtag) && !empty($gdatum)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $receiver = "kontakt@xenz.gg";
            $subject = "Neue Bewerbung von $vorname [$gtag]";
            $body = "Vorname: $vorname\nGamertag: $gtag\nE-Mail: $email\nGeburtstag: $gdatum\nFreitext: $freitext";
            $sender = "Von: $email" . "\r\n" . "Reply-To: $email";
            if(mail($receiver, $subject, $body, $sender)) {
                echo "Deine Bewerbung wurde erfolgreich versendet.";
            } else {
                echo "Fehler beim Senden der E-Mail";
            }
        } else {
            echo "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
        }
    } else {
        echo "Bitte alle Felder ausfüllen!";
    }
?>