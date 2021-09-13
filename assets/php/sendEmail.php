<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once "../../phpMailer/vendor/autoload.php";

    //PHPMailer Object
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

    //From email address and name
    $mail->From = "no-reply@rookietest.tech";
    $mail->FromName = "Rookie Test";

    //To address and name
    $mail->addAddress($email); //Recipient name is optional

    //Send HTML or Plain Text email
    $mail->isHTML(true);

    $conf = "http://rookietest.tech/secret-diary/login/confEmail.php?email=".mysqli_real_escape_string($link, $_POST['email']);

    $str = <<<EOD
    Confirm you email
    to be able to login from any device!
    $conf
    EOD;

    $mail->Subject = "Secret Diary";
    $mail->Body = $str;
    $mail->AltBody = "Confirm your email by clicking this link";

    try {
        $mail->send();
        header("location: checkEmail.php ");
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }


?>