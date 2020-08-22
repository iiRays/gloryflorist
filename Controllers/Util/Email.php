<?php

require_once('PHPMailer/PHPMailer.php');
require_once('PHPMailer/SMTP.php');
require_once('PHPMailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Utilizes the PHPMailer library to send emails
 *
 * @author Johann Lee Jia Xuan
 */
class Email {
    public static function send($target, $subject, $message) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Mailer = "smtp";
        $mail->Host = "smtp.gmail.com";
        $mail->WordWrap = 70;
        $mail->isHTML(true);
        $mail->Username = "gloryfloristflowers@gmail.com";
        $mail->Password = "gf12345#";
        $mail->SetFrom("gloryfloristflowers@gmail.com", "Glory Florist");

        $mail->addAddress($target);
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        if (!$mail->Send()) {
            return false;
        }
        return true;
    }

}
