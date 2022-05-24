//Contact Form in PHP
<?php
  $name = htmlspecialchars($_POST['vorname']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['playername']);
  $website = htmlspecialchars($_POST['age']);
  $message = htmlspecialchars($_POST['freitext']);
  if(!empty($email) && !empty($age) && !empty($email) && !empty($playername)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "kontakt@xenz.gg"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
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