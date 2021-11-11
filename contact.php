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
                $errors[] = 'That\' not a valid email address!';
            }
            if (ctype_alpha($name) === false) {
                $errors[] = 'Your name must only contain letters!';
            }
        }
        if (empty($errors) === true) {
            mail('ductuan.bbl@gmail.com', 'Contact form | Book Bear Library', $message, 'From: ' . $email);
            header('Location: contact.php?sent');
            exit();
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <br>
    <?php
        if (empty($errors) === false) {
            echo '<ul>';
            foreach($errors as $error) {
                echo '<li>', $error, '</li>';
            }
            echo '</ul>';
        }
    ?>
    <form action="" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" <?php if (isset($_POST['$name']) === true) {echo 'value="', strip_tags($_POST['name']), '"'; } ?>>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" <?php if (isset($_POST['$email']) === true) {echo 'value="', strip_tags($_POST['email']), '"'; } ?>>
        </p>
        <p>
            <label for="message">Message:</label>
            <textarea name="message" id="message"> <?php if (isset($_POST['$message']) === true) {echo strip_tags($_POST['message']); } ?></textarea>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>








      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>