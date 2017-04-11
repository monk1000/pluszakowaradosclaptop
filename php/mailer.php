<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
		      $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["adresemail"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! Coś poszło nie tak. Nie mogliśmy wysłać twojej wiadmości. Prosimy wypełnić cały formularz i spróbować jeszcze raz.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "monk1000@gmail.com";

        // Set the email subject.
        $subject = "Nowa wiadomość z pluszakowradosc.pl od $name";

        // Build the email content.
        $email_content = "Imię i nazwisko: $name\n";
        $email_content = "Adres e-mail: $email\n\n";
        $email_content = "Treść wiadomości:\n$message\n";

        // Build the email headers.
        $$email_headers = “Reply-To: $name < $email>“;

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Dziękujemy za wiadmość! Twój e-mail został wysłany. Odpowiemy na niego w najszybszym możliwym terminie.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Coś poszło nie tak. Nie mogliśmy wysłać twojej wiadmości.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Problem z wysłaniem wiadomości. Spróbuj ponownie.";
    }

?>