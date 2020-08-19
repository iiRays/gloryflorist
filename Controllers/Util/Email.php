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

    private $mail;

    public function __construct($mail) {
        $this->mail = $mail;
    }

    public function send($target, $subject, $message) {
        $mail = $this->mail;

        $mail->addAddress($target);
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        if (!$mail->Send()) {
            return false;
        }
        return true;
    }

    public static function sendWithHeader($target, $subject, $message, $header) {
        $mail = self::createEmail();

        $mail->addAddress($target);
        $mail->Subject = $subject;
        $mail->msgHTML($message);
        $mail->headerLine($header, "");

        if (!$mail->Send()) {
            return false;
        }
        return true;
    }

    public static function createEmail() {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Username = "gloryfloristflowers@gmail.com";
        $mail->Password = "gf12345#";
        $mail->Host = "smtp.gmail.com";
        $mail->Mailer = "smtp";
        $mail->SetFrom("gloryfloristflowers@gmail.com", "Glory Florist");
        $mail->WordWrap = 70;
        $mail->isHTML(true);

        return $mail;
    }

    // Some setters and getters

    function getMail() {
        return $this->mail;
    }

    function setMail($mail) {
        $this->mail = $mail;
        return $this;
    }

}
