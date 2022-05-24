//Contact Form in PHP
<?php
  $name = htmlspecialchars($_POST['vorname']);
  $email = htmlspecialchars($_POST['email']);
  $playername = htmlspecialchars($_POST['playername']);
  $age = htmlspecialchars($_POST['age']);
  $message = htmlspecialchars($_POST['freitext']);
  if(!empty($name) && !empty($age) && !empty($email) && !empty($playername)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "kontakt@xenz.gg";
      $subject = "From: $name <$email>";
      $body = "Name: $name\nE-Mail: $email\Gamertag: $playername\nAlter: $age\n\nnachricht:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>