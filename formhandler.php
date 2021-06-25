<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = $email;
    $email_subject = 'BB Library Form Submission';
    $email_body = "Name: $name./n".
                    "Email: $email./n".
                "Message: $message./n";

    $to = "bennguyen0808@gmail.com";
    mail($to,$email_subject,$email_body);
?>