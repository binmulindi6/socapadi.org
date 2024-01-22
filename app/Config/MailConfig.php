<?php

namespace App\Config;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class MailConfig
{
    public const SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
    public const Host = 'mail.easychik.com';
    public const SMTPAuth = true;
    public const Username = 'contact@easychik.com';
    public const Password = 'admin@easyChik';
    public const SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    public const Port = 465;
}
