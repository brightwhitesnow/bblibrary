<?php
    if (empty($_POST) === false) {
        $errors = array();

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (empty($name) === true || empty(email) === true || empty(message) === true) {
            $errors[] = 'Name, Email, and message are required!'
        } else {
            if (filter_var(email, FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'That\'s not a valid email address!';
            }
            if (ctype_alpha($name) === false) {
                $errors[] = 'Your name must only contain letters!';
            }
        }
        if (empty($errors) === true) {
            mail('ductuan.bbl@bblibrary.com', 'Contact form | Book Bear Library', $message, 'From: ' . $email);
            header('Location: contact.php?sent');
            exit();
        }
    }
?>

