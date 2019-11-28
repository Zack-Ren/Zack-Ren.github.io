<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanks!</title>
    <?php
        if(!isset($_POST['submit']))
        {
            echo "error; you need to submit the form!";
        }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        

        if (empty($name) || empty($email)){
            echo "Please enter a name and email so I can contact you back!"
            exit;
        }
        if(IsInjected($visitor_email)){
            echo "Bad email value!";
            exit;
        }

        $email_from = 'renzackary@gmail.com';
        $email_subject = "New Message";
        $email_body ="New message from: $name\nEmail: $email\nSubject: $subject\nMessage: $message"

        $to = "renzackary@gmail.com";
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";

        mail($to, $email_subject, $email_body, $headers);
        header('Location: thank-you.html');

        function IsInjected($str){
            $injections = array('(\n+)',
                '(\r+)',
                '(\t+)',
                '(%0A+)',
                '(%0D+)',
                '(%08+)',
                '(%09+)'
                );
            $inject = join('|', $injections);
            $inject = "/$inject/i";
            if(preg_match($inject,$str))
            {
                return true;
            }
            else{
                return false;
            }
        }
    ?>
</head>
<body>
        <h1>thanks</h1>
</body>
</html>
    
