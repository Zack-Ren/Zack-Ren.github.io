<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    $mailTo = "renzackary@gmail.com";
    $headers = "From: ".$email;
    $txt = "Recieved a message from ".$name.".\n\n".$msg;
    
    mail($mailTo, $subject, $txt, $headers);
    header("Location: index.php?mainsend");
}
