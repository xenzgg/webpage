<?php
  $name = htmlspecialchars($_POST['vorname']);
  $email = htmlspecialchars($_POST['email']);
  $playername = htmlspecialchars($_POST['playername']);
  $age = htmlspecialchars($_POST['age']);
  $message = htmlspecialchars($_POST['freitext']);
  if(!empty($name) && !empty($age) && !empty($email) && !empty($playername)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "bewerbung@xenz.gg";
      $subject = "Bewerbung $name [$playername]";
      $body = "Name: $name\nE-Mail: $email\nGamertag: $playername\nAlter: $age\n\nnachricht:\n$message";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Deine Bewerbung wurde erfolgreich versendet!";
      }else{
         echo "Fehler, deine Nachricht konnte nicht gesendet werden!";
      }
    }else{
      echo "Gib bitte eine gültige E-Mail-Adresse an.";
    }
  }else{
    echo "Vorname, E-Mail, Spielername und Alter müssen ausgefüllt sein!";
  }
?>