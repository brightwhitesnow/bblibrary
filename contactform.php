<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mailfrom = $_POST['mail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailto = "ductuan.bbl@bblibrary.com";
    $headers = "From: ".$mailfrom
    $txt = "You have recieved an message from ".$name.".\n\n".$message;

    mail($mailto, $subject, $txt, $headers);
    header("Location: contact.html?mailsend");
}