<?php

require_once("Email.php");
require_once('PHPMailer/PHPMailer.php');
require_once('PHPMailer/SMTP.php');
require_once('PHPMailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 *
 * @author Johann Lee Jia Xuan
 */
class EmailFactory{
    
    public function build() {
        return new Email($this->createEmail());
    }
    
     private function createEmail(){
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

}
