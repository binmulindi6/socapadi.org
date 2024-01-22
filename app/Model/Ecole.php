<?php

namespace App\Model;

use App\Config\MailConfig;
// use Exception;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Ecole extends Model
{


    protected $table_name = 'ecoles';
    protected $class_name = 'App\Model\Ecole';

    function _construct()
    {
    }

    public function sendMail()
    {
        try {
            $to = "contact@easychik.com";
            $subject = "Demande de Partenariat From";
            $cc = "binmulindi.abraham@gmail.com";
            $message = "
                <p>Ecole : " . $this->nom . "</p> " .
                "<p>Maternel : " . ($this->maternelle == 1 ? '✅' : '❌') . "</p> " .
                "<p>Primaire : " . ($this->primaire == 1 ? '✅' : '❌') . "</p> " .
                "<p>Secondaire : " . ($this->secondaire == 1 ? '✅' : '❌') . "</p> " .
                "<p>ITM : " . ($this->itm == 1 ? '✅' : '❌') . "</p> " .
                "<p> Mail : " . $this->email . "</p>" .
                "<p> Telephone : " . $this->telephone1 . "</p>" .
                "<p> Adresse : " . $this->adresse . "</p>";

            $headers = "From:easyChik <" . $this->email . ">\r\n" .
                "CC:" . $cc . "" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                
            if (mail($to, $subject, $message, $headers)) {
                // return 'success';
                return $this->reception($this->email,$this->nom);
            } else {
                $this->delete();
                return 'not sent';
            }
        } catch (Exception $e) {
            return 'Message could not be sent. Mailer Error: ' . $e;
        }
    }

    public function reception($email,$nom){
            $to = $email;
            $subject = "Accusé de Réception";
            $message = 
            "<html><body>" .
                "<h3>Cher " . $nom . ",</h3> " .
                "<p> Nous Accusons la réception de votre Demande de Partenariat.</p>" .
                "<p> Nous vous rémercions de nous avoir contacté, nous vous promettons des vous revenir dans le plus bref delai.</p>".
                "<p>  </p>".
                "<h3> l'équipe d'<b>easyChik</b> </h3>".
                "</body></html>";

            $headers = "From:easyChik <contact@easychik.com>>\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
                return 'success';
            } else {
                $this->delete();
                return 'not sent';
            }
    }
}
