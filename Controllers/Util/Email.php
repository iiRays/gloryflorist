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
    
    // Some setters and getters
    
    function getMail() {
        return $this->mail;
    }

    function setMail($mail) {
        $this->mail = $mail;
        return $this;
    }



}
