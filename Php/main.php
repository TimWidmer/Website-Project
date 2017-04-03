<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "timwidmer.email@gmail.com";
    $email_subject = "Your email subject line";

    function died($error) {
        // your error code can go here
        echo "Ups! Ein Fehler ist aufgetreten!";
        echo "Fehler:<br /><br />";
        echo $error."<br /><br />";
        echo "Bitte melde diesen Fehler an die Email: 'timwidmer7@gmail.com' <br/><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['category']) ||
        !isset($_POST['message']) ||
        !isset($_POST['verify']) ||
        died('Ups, da ist ein Fehler aufgetreten. :/');
    }



    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $category = $_POST['category'];
    $message = $_POST['message'];
    $verify = $_POST['verify'];

    $error_message = "Ups! Ein Fehler ist aufgetreten!";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'Diese Email Adresse ist nicht gültig!<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Bitte gebe ein Namen ein!<br />';
  }

       if(function selected($category)) {
         $error_message .= 'Bitte wähle eine Kategorie aus!<br />';
       }

  if(strlen($message) < 2) {
    $error_message .= 'Bitte gebe eine Nachricht ein!<br />';
  }

              if(function selected($verify)) {
         $error_message .= 'Bitte bestätige das du kein Roboter bist! ;)<br />';
       }

  if(strlen($error_message) > 0) {
    died($error_message);
  }


    $email_message = "InformatikRosenau | Kontaktanfrage\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Kategorie: ".clean_string($category)."\n";
    $email_message .= "Nachricht: ".clean_string($message)."\n";

// create email headers
$headers = 'Von: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?php

}
?>

